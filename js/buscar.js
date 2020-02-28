      // Buscador
      var templateSource = document.getElementById('resultados-template').innerHTML,
          template = Handlebars.compile(templateSource),
          resultadosPlaceholder = document.getElementById('resultados'),
          playingCssClass = 'playing',
          audioObject = null;

      var fetchTracks = function (albumId, callback) {
          $.ajax({
              url: 'https://api.spotify.com/v1/albums/' + albumId,
              success: function (response) {
                  callback(response);
              }
          });
      };

      var searchAlbums = function (query) {
          $.ajax({
              url: 'https://api.spotify.com/v1/search',
              data: {
                  q: query,
                  type: 'album'
              },
              success: function (response) {
                  resultadosPlaceholder.innerHTML = template(response);
              }
          });
      };

      resultados.addEventListener('click', function (e) {
          var target = e.target;
          if (target !== null && target.classList.contains('cover')) {
              if (target.classList.contains(playingCssClass)) {
                  audioObject.pause();
              } else {
                  if (audioObject) {
                      audioObject.pause();
                  }
                  fetchTracks(target.getAttribute('data-album-id'), function (data) {
                      audioObject = new Audio(data.tracks.items[0].preview_url);
                      audioObject.play();
                      target.classList.add(playingCssClass);
                      audioObject.addEventListener('ended', function () {
                          target.classList.remove(playingCssClass);
                      });
                      audioObject.addEventListener('pause', function () {
                          target.classList.remove(playingCssClass);
                      });
                  });
              }
          }
      });

      document.getElementById('search-form').addEventListener('submit', function (e) {
          e.preventDefault();
          searchAlbums(document.getElementById('query').value);
      }, false);

      // Ocultamos nuestro acces token por seguridad
      if(typeof window.history.pushState == 'function') {
          window.history.pushState({}, "Hide", "https://nubecolectiva.com/blog/tutos/demos/metadata_api_spotify/buscar/");
      }
