<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/src/favicon.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vite App</title>
    <?php if (isDevMode()) : ?>
      <script type="module" src="http://localhost:5173/@vite/client"></script> 
    <?php else: ?>

       <?php
        try {
            // Obtén los datos del entry principal
            $assets = getViteAssets('src/main.jsx');

            // Incluye el archivo CSS si está definido
            if (!empty($assets['css'])) {
                foreach ($assets['css'] as $cssFile) {
                    echo '<link rel="stylesheet" href="/static/vendor/' . $cssFile . '">' . PHP_EOL;
                }
            }
        } catch (Exception $e) {
            echo "<!-- " . $e->getMessage() . " -->";
        }
    ?>
    <?php endif; ?>

    <script>
      if (localStorage.theme === 'dark' || !('theme' in localStorage)) {
        document.querySelector('html').classList.add('dark');
        document.querySelector('html').style.colorScheme = 'dark';
      } else {
        document.querySelector('html').classList.remove('dark');
        document.querySelector('html').style.colorScheme = 'light';
      }        
    </script>      
  </head>
  <body class="font-inter antialiased bg-gray-100 dark:bg-gray-900 text-gray-600 dark:text-gray-400">
    <noscript>You need to enable JavaScript to run this app.</noscript>
    <script>
        if (localStorage.getItem('sidebar-expanded') == 'true') {
            document.querySelector('body').classList.add('sidebar-expanded');
        } else {
            document.querySelector('body').classList.remove('sidebar-expanded');
        }
    </script>   
    
    <div id="root"></div>
    <?php if (isDevMode()) : ?>
      <script type="module" >
            import RefreshRuntime from 'http://localhost:5173/@react-refresh'
            RefreshRuntime.injectIntoGlobalHook(window)
            window.$RefreshReg$ = () => {}
            window.$RefreshSig$ = () => (type) => type
            window.__vite_plugin_react_preamble_installed__ = true
      </script> 
      <script type="module" src="http://localhost:5173/src/main.jsx"></script>   
      <?php else: ?>
        <script type="module" src="/static/vendor/main.js"></script>
      <?php endif; ?>
  </body>
</html>
