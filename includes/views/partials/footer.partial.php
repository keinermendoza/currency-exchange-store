<?php 
$address = $infosite["address"] ?? '';
$encodedAddress = urldecode($address);
?>

</div> 
<footer class="bg-green-800 text-white p-8">
    <div class="mx-auto w-full max-w-5xl flex flex-col gap-8 xl:flex-row items-center justify-between">

        <div>
            <p class="text-center">
                Siguenos en Nuestras <br>
                Redes Sociales
            </p> 
            
            <ul class="mt-4 flex justify-center items-center gap-6">
                <?php if ($social["facebook"] ?? false) : ?>
                <li>
                    <a target="_blank" href="<?= $social["facebook"] ?>">
                    <svg class="size-8" width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M35.3811 0.583984H2.61865C2.07993 0.583984 1.56328 0.79799 1.18234 1.17892C0.801408 1.55986 0.587402 2.07651 0.587402 2.61523V35.3809C0.587402 35.9196 0.801408 36.4362 1.18234 36.8172C1.56328 37.1981 2.07993 37.4121 2.61865 37.4121H20.2499V23.1527H15.4562V17.5934H20.2499V13.4934C20.2499 8.73711 23.1562 6.14648 27.3999 6.14648C28.832 6.14138 30.2633 6.2144 31.6874 6.36523V11.3371H28.753C26.4437 11.3371 25.9968 12.434 25.9968 14.0434V17.5934H31.4999L30.7843 23.1527H25.9968V37.4152H35.3718C35.9102 37.4144 36.4264 37.2001 36.8072 36.8194C37.1879 36.4386 37.4022 35.9224 37.403 35.384V2.61836C37.4039 2.08072 37.1915 1.56468 36.8125 1.18333C36.4335 0.801995 35.9188 0.586465 35.3811 0.583984Z" fill="white"/>
                    </svg>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($social["tiktok"] ?? false)  : ?>
                <li>
                    <a href="<?= $social["tiktok"] ?>">
                    <svg class="size-8 p-0.5 border-2 bolder-solid rounded-md" width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M33.1998 11.64C31.833 10.0791 31.0796 8.0748 31.0798 6H24.8998V30.8C24.8531 32.1424 24.2869 33.4142 23.3204 34.347C22.354 35.2798 21.063 35.8008 19.7198 35.8C16.8798 35.8 14.5198 33.48 14.5198 30.6C14.5198 27.16 17.8398 24.58 21.2598 25.64V19.32C14.3598 18.4 8.31982 23.76 8.31982 30.6C8.31982 37.26 13.8398 42 19.6998 42C25.9798 42 31.0798 36.9 31.0798 30.6V18.02C33.5858 19.8197 36.5946 20.7853 39.6798 20.78V14.6C39.6798 14.6 35.9198 14.78 33.1998 11.64Z" fill="white"/>
                    </svg>
                    </a>
                </li>
                <?php endif; ?>


                <?php if ($social["instagram"] ?? false)  : ?>
                <li>
                    <a href="<?= $social["instagram"] ?>">
                    <svg class="size-10" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                    </svg>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($social["youtube"] ?? false)  : ?>
                <li>
                    <a href="<?= $social["youtube"] ?>">
                    <svg class="size-8 p-0.5 border-2 border-solid rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Zm-11.692 6.554v-5.62l5.4 2.819-5.4 2.801Z" clip-rule="evenodd"/>
                    </svg>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($social["twitter"] ?? false)  : ?>
                <li>
                    <a href="<?= $social["twitter"] ?>">
                    <svg class="size-8 p-0.5 border-2 border-solid rounded-md" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.795 10.533 20.68 2h-3.073l-5.255 6.517L7.69 2H1l7.806 10.91L1.47 22h3.074l5.705-7.07L15.31 22H22l-8.205-11.467Zm-2.38 2.95L9.97 11.464 4.36 3.627h2.31l4.528 6.317 1.443 2.02 6.018 8.409h-2.31l-4.934-6.89Z"/>
                    </svg>

                    </a>
                </li>
                <?php endif; ?>

                <?php if ($social["threads"] ?? false)  : ?>
                <li>
                    <a href="<?= $social["threads"] ?>">
                        <svg  class="size-8 p-0.5 border-2 border-solid rounded-md" aria-label="Threads" fill="currentColor"  viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg">
                            <path class="" d="M141.537 88.9883C140.71 88.5919 139.87 88.2104 139.019 87.8451C137.537 60.5382 122.616 44.905 97.5619 44.745C97.4484 44.7443 97.3355 44.7443 97.222 44.7443C82.2364 44.7443 69.7731 51.1409 62.102 62.7807L75.881 72.2328C81.6116 63.5383 90.6052 61.6848 97.2286 61.6848C97.3051 61.6848 97.3819 61.6848 97.4576 61.6855C105.707 61.7381 111.932 64.1366 115.961 68.814C118.893 72.2193 120.854 76.925 121.825 82.8638C114.511 81.6207 106.601 81.2385 98.145 81.7233C74.3247 83.0954 59.0111 96.9879 60.0396 116.292C60.5615 126.084 65.4397 134.508 73.775 140.011C80.8224 144.663 89.899 146.938 99.3323 146.423C111.79 145.74 121.563 140.987 128.381 132.296C133.559 125.696 136.834 117.143 138.28 106.366C144.217 109.949 148.617 114.664 151.047 120.332C155.179 129.967 155.42 145.8 142.501 158.708C131.182 170.016 117.576 174.908 97.0135 175.059C74.2042 174.89 56.9538 167.575 45.7381 153.317C35.2355 139.966 29.8077 120.682 29.6052 96C29.8077 71.3178 35.2355 52.0336 45.7381 38.6827C56.9538 24.4249 74.2039 17.11 97.0132 16.9405C119.988 17.1113 137.539 24.4614 149.184 38.788C154.894 45.8136 159.199 54.6488 162.037 64.9503L178.184 60.6422C174.744 47.9622 169.331 37.0357 161.965 27.974C147.036 9.60668 125.202 0.195148 97.0695 0H96.9569C68.8816 0.19447 47.2921 9.6418 32.7883 28.0793C19.8819 44.4864 13.2244 67.3157 13.0007 95.9325L13 96L13.0007 96.0675C13.2244 124.684 19.8819 147.514 32.7883 163.921C47.2921 182.358 68.8816 191.806 96.9569 192H97.0695C122.03 191.827 139.624 185.292 154.118 170.811C173.081 151.866 172.51 128.119 166.26 113.541C161.776 103.087 153.227 94.5962 141.537 88.9883ZM98.4405 129.507C88.0005 130.095 77.1544 125.409 76.6196 115.372C76.2232 107.93 81.9158 99.626 99.0812 98.6368C101.047 98.5234 102.976 98.468 104.871 98.468C111.106 98.468 116.939 99.0737 122.242 100.233C120.264 124.935 108.662 128.946 98.4405 129.507Z"></path></svg>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="flex flex-col gap-2">
            <?php if( $infosite["address"] ?? false) : ?>
               <p class="text-center">
                    <a class="flex justify-center items-center gap-4" aria-label="nuestra ubicación" target="_blank" href="https://maps.google.com/?q=<?= $encodedAddress ?>">
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path fill-rule="evenodd" d="m11.54 22.351.07.04.028.016a.76.76 0 0 0 .723 0l.028-.015.071-.041a16.975 16.975 0 0 0 1.144-.742 19.58 19.58 0 0 0 2.683-2.282c1.944-1.99 3.963-4.98 3.963-8.827a8.25 8.25 0 0 0-16.5 0c0 3.846 2.02 6.837 3.963 8.827a19.58 19.58 0 0 0 2.682 2.282 16.975 16.975 0 0 0 1.145.742ZM12 13.5a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" clip-rule="evenodd" />
                        </svg>
                        <span>
                            <?= $infosite["address"] ?>
                        </span>
                    </a>
               </p>

            <?php endif; ?>

            <?php if($infosite["phone_number"] ?? false) : ?>
                <p class="text-center flex items-center justify-center gap-4" aria-label="numero de telefono">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                        <path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />
                    </svg>
                    <?= $infosite["phone_number"] ?>
                </p>
            <?php endif; ?>

            <?php if($infosite["email"] ?? false) : ?>
                <a class="text-center flex items-center justify-center gap-4" href="mailto:<?= $infosite["email"] ?>" aria-label="envianos un email">
                    <svg  class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" >
                        <path d="M1.5 8.67v8.58a3 3 0 0 0 3 3h15a3 3 0 0 0 3-3V8.67l-8.928 5.493a3 3 0 0 1-3.144 0L1.5 8.67Z" />
                        <path d="M22.5 6.908V6.75a3 3 0 0 0-3-3h-15a3 3 0 0 0-3 3v.158l9.714 5.978a1.5 1.5 0 0 0 1.572 0L22.5 6.908Z" />
                    </svg>
                    <span ><?= $infosite["email"] ?></span>
                </a>
            <?php endif; ?>

        </div>


    </div>


</footer>   
</body>
</html>