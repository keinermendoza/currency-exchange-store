<?php
    $encoded_message = urlencode($infosite["whatsapp_message"] ?? '');
?>

<?php require base_path("views/partials/head.partial.php"); ?>
<?php require base_path("views/partials/nav.partial.php"); ?>
 
<script id="exchanges-json" type="application/json"><?= json_encode($exchanges) ?></script>
<main class="p-4">


    <?php if(isset($infosite["whatsapp_number"])) : ?>
        <p class="fixed z-20 transition-transform duration-200 hover:scale-110 bottom-10 right-10">
            <a class="flex items-center p-4 gap-4 rounded-full bg-[#3edf5b] text-white" 
            target="_blank" href="https://wa.me/<?= $infosite["whatsapp_number"] ?>?text=<?= $encoded_message ?>" aria-label="Realizar envio de dinero">
                <svg class="size-8" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                </svg>
            </a>
        </p>
        <?php endif ?>

    <section class="relative p-4 sm:p-8 w-full max-w-5xl mx-auto h-screen max-h-[600px] rounded-lg overflow-hidden">
    <picture>
        <source media="(max-width: 640px)" srcset="/static/bg-exchange-phone.jpg" />
        <source media="(max-width: 799px)" srcset="/static/bg-exchange-tablet.jpg" />
        <source media="(min-width: 800px)" srcset="/static/bg-exchange-desktop.jpg" />
        <img class="w-full h-full absolute top-0 left-0 object-cover object-center" src="/static/bg-exchange-desktop.jpg" alt="Chris standing up holding his daughter Elva" />
    </picture>

    <div class="relative z-10 flex flex-col justify-between h-full w-2/3 sm:w-1/2">

        <div>

            <svg class="mx-auto my-10 sm:mx-0" width="265" height="55" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.8.8A20 20 0 0 1 23.4 2l.4.4.2.6.4 4.5-.2.2-.2-.1a8 8 0 0 0-3.2-4.4 9.6 9.6 0 0 0-5.4-1.5c-1.9 0-3.5.4-4.9 1.3-1.3.8-2.4 2-3.1 3.6a15.7 15.7 0 0 0 .3 11.9c.9 1.9 2 3.5 3.6 4.6a8.6 8.6 0 0 0 5.2 1.7c3.7 0 6.3-2 7.8-6.2l.2-.1h.2v.2l-.4 4.5-.2.6-.5.3c-2.3.9-4.7 1.4-7.1 1.4-3 0-5.6-.7-7.7-1.9-2-1.2-3.5-2.8-4.5-4.7A13 13 0 0 1 3 13c0-2.3.6-4.4 1.9-6.2 1.3-1.9 3-3.3 5.2-4.3C12 1.4 14.4.8 16.8.8Zm16.7 14.9h7l.2.8H33l.6-.8Zm14 8.8c.2 0 .2.1.2.3 0 .1 0 .2-.2.2a50 50 0 0 1-4.4-.2 28.3 28.3 0 0 0-3.4.2l-.1-.2.1-.3c.7 0 1.1 0 1.4-.2.3-.2.4-.4.4-.8s-.1-1-.5-1.7L35.5 10l1.3-1.5-4.9 11.8c-.4 1-.6 1.9-.6 2.5 0 .6.2 1 .6 1.3.5.3 1.2.4 2.1.4.1 0 .2.1.2.3 0 .1 0 .2-.2.2h-1.5a27.8 27.8 0 0 0-6 0c-.2 0-.3 0-.3-.2s0-.3.2-.3c.8 0 1.4 0 1.9-.3.5-.2.9-.6 1.3-1.3.4-.6.9-1.6 1.4-3l5.6-13.3.2-.1.2.1 6.1 13.2 1.6 3c.4.7.8 1.1 1.2 1.4.4.2 1 .3 1.6.3Zm4.3-16.4h.8l-.4 12.6c0 1.4.2 2.4.6 3 .4.6 1 .8 2 .8l.1.3v.2H48.6v-.5c1 0 1.7-.2 2-.8.5-.6.7-1.6.8-3L51.8 8Zm20.8 16.4v.5h-8.3v-.5a7 7 0 0 0 2-.1c.4-.2.6-.5.8-.8l.2-1.7-.6-13.5.8-.7-7.1 17-.3.2c-.1 0-.2 0-.3-.2l-7.3-14.3c-.9-1.8-2-2.7-3.5-2.7l-.1-.3v-.2h4.5c.3 0 .6.1.8.4l1 1.6 6.1 12.2-1.2 2.3 6.4-15.5.5-.7c.2-.2.4-.3.7-.3h4.7l.1.2v.3c-1.1 0-1.9.1-2.4.5-.4.3-.6 1-.5 2L70 22l.2 1.7c.2.4.4.6.7.8l1.6.1Zm12.5-9.4c2 0 3.6.5 4.7 1.2 1.1.8 1.7 1.9 1.7 3.3 0 1-.3 2-1 2.9-.6.8-1.4 1.5-2.5 2-1.1.4-2.3.7-3.7.7a28 28 0 0 1-3.7-.2H75l-.1-.2v-.3l1.9-.1c.4-.2.6-.4.7-.8.2-.3.2-1 .2-1.7V10.3c0-.8 0-1.3-.2-1.7 0-.3-.3-.6-.7-.7a5 5 0 0 0-1.8-.2v-.5h1.7a46.2 46.2 0 0 0 7-.1 8 8 0 0 1 4.2 1c1 .6 1.6 1.6 1.6 2.8 0 1.1-.5 2-1.4 3-1 .8-2.3 1.3-4 1.6l1-.4Zm-2.4-7.5c-.6 0-1 0-1.4.2-.3.2-.5.4-.6.8a6 6 0 0 0-.2 1.8v4.9l-1.2-.3 2 .2 3.2-.2c.7-.2 1.2-.5 1.6-1 .4-.5.6-1.3.6-2.3 0-2.7-1.4-4.1-4-4.1Zm1 17c3.2 0 4.8-1.4 4.8-4.1A4 4 0 0 0 87 17c-1-.8-2.6-1.3-4.8-1.3l-2.9.2 1.2-.3v6.2c0 1 .2 1.7.6 2 .4.5 1.3.6 2.5.6Zm16.3-2.7c0 .8 0 1.4.2 1.7.1.4.3.6.7.8l1.8.1.1.3-.1.2h-8.3v-.5l1.8-.1c.4-.2.6-.4.7-.8.2-.3.3-1 .3-1.7V10.3c0-.8-.1-1.3-.3-1.7 0-.3-.3-.6-.7-.7-.4-.2-1-.2-1.8-.2v-.5h1.8a46.6 46.6 0 0 0 4.8 0h1.7l.1.2-.1.3a5 5 0 0 0-1.8.2c-.3.2-.6.4-.7.8l-.2 1.7v11.5Zm14.6 3.6a9 9 0 0 1-8-4.7 9.7 9.7 0 0 1 .4-9.7c1-1.4 2.3-2.5 3.9-3.2 1.5-.8 3.2-1.1 4.8-1.1a8.8 8.8 0 0 1 7.9 4.7 9.2 9.2 0 0 1-.3 9.1 10.3 10.3 0 0 1-8.7 4.9Zm1-.8c1.8 0 3.2-.7 4.3-2.1 1-1.5 1.6-3.4 1.6-5.8 0-1.7-.3-3.3-.8-4.6a7.6 7.6 0 0 0-2.5-3.3 6 6 0 0 0-3.8-1.3c-1.8 0-3.3.7-4.3 2a9 9 0 0 0-1.5 5.6c0 1.7.3 3.3.8 4.8a8.2 8.2 0 0 0 2.5 3.4c1 .8 2.3 1.3 3.7 1.3Zm15.1-14.5c0 .8.2 1.4.6 2l1.4 1.4a45.7 45.7 0 0 0 5 2.7c.6.5 1.2 1 1.6 1.7.4.6.7 1.4.7 2.3 0 1-.3 1.8-.9 2.6-.5.8-1.3 1.4-2.2 1.9a8 8 0 0 1-3.5.7c-1 0-1.9-.2-2.7-.4-.9-.3-1.6-.6-2.2-1a.7.7 0 0 1-.2-.2l-.1-.5-.4-4 .2-.1h.3a10 10 0 0 0 2.3 3.9c1 1 2.3 1.6 3.6 1.6.8 0 1.5-.3 2.1-.8.6-.5 1-1.2 1-2.3 0-.8-.3-1.5-.7-2.1-.4-.6-.9-1.1-1.5-1.6l-2.4-1.4-2.3-1.4c-.7-.4-1.2-1-1.6-1.6a4 4 0 0 1-.6-2.2 4 4 0 0 1 1.7-3.4 7.2 7.2 0 0 1 4.3-1.2c1.4 0 2.8.3 4.1.8l.4.3.2.4.1 3.4c0 .1 0 .2-.2.2h-.2c-.2-.6-.5-1.3-1-2-.4-.7-1-1.3-1.7-1.7a4 4 0 0 0-2.4-.8c-.9 0-1.6.3-2 .8-.5.5-.8 1.2-.8 2Zm23.9-5.9c0-.7 0-1.3-.2-1.6-.2-.4-.5-.6-1-.8l-1.9-.2-.1-.2.1-.3h2a61.7 61.7 0 0 0 5.3 0h1.9v.5c-1 0-1.6 0-2 .2-.4.2-.7.5-.9.8l-.2 1.7v17.5c0 .8 0 1.4.2 1.7.1.4.4.6.8.8a8 8 0 0 0 2 .1c.1 0 .2.1.2.3l-.1.2h-9.3v-.5l2-.1c.5-.2.8-.4 1-.8l.2-1.7V4.3Zm3.9 7.8 2.2-2 5.7 7.3c1.7 2.4 3.1 4.1 4 5 1 1 1.7 1.6 2.2 1.8.5.2 1.3.3 2.2.3l.1.3-.1.2h-5.4l-.9-.1a85.5 85.5 0 0 0-4.3-5.4l-5.7-7.4Zm6.9-7.5c.8-.9 1.2-1.5 1.2-2 0-.6-.8-.9-2.2-.9-.1 0-.2 0-.2-.2s0-.3.2-.3h1.6a58 58 0 0 0 5.7 0h1.5l.1.3v.2c-1.2 0-2.3.3-3.6.8-1.2.5-2.3 1.3-3.4 2.3l-9.7 9.7h-1l9.8-10ZM176.2 25v-.5l1.8-.1c.4-.2.6-.4.7-.8.2-.3.3-1 .3-1.7V10.3c0-.8-.1-1.3-.3-1.7-.1-.3-.3-.6-.7-.7a5 5 0 0 0-1.8-.2v-.5h13.4c.3 0 .4.1.4.3v4.2l-.2.1-.2-.1a5 5 0 0 0-1.6-2.8 4 4 0 0 0-2.8-1.2h-.8c-.8 0-1.4 0-1.8.2-.3.2-.6.4-.7.8l-.2 1.6v11.5l.2 1.6c.1.4.4.7.7.8l1.8.2h1.4c1 0 2-.4 3-1.3.9-.8 1.5-1.9 1.9-3.2h.4a48 48 0 0 0-.4 5l-.4.1h-14Zm11.8-8.2-1.7-.2c-1-.2-3-.2-5.7-.2v-.9a56.5 56.5 0 0 0 7.4-.4c.2 0 .3.3.3.9 0 .5-.1.8-.3.8Zm11.7 5.1c0 .8 0 1.4.2 1.7 0 .4.3.6.7.8l1.8.1v.5H194l-.1-.2v-.3l1.9-.1c.3-.2.6-.4.7-.8.2-.3.3-1 .3-1.7V10.3c0-.8-.1-1.3-.3-1.7-.1-.3-.4-.6-.7-.7-.4-.2-1-.2-1.8-.2l-.1-.3v-.2h1.9a46.6 46.6 0 0 0 4.8 0h1.7v.5a5 5 0 0 0-1.8.2c-.3.2-.6.4-.7.8-.2.4-.2 1-.2 1.7v11.5Zm7.8-13.8h.7v12.6c0 1.4.3 2.4.7 3 .4.6 1 .8 2 .8l.1.3v.2H204.7v-.5c1 0 1.7-.2 2-.8.5-.6.7-1.6.7-3V8Zm14.3 17.3-.2.1h-.2l-12.8-15.2a11 11 0 0 0-2.2-2 3 3 0 0 0-1.7-.6v-.5h4.6c.2 0 .4 0 .5.2l.6.7.8 1 10.2 12.3.4 4Zm0 0-.7-1.2V11.6c0-1.4-.2-2.4-.7-3-.4-.6-1-1-2-1v-.4h1.3a24.9 24.9 0 0 0 3.4 0h1.5v.5c-1 0-1.7.3-2.1.9-.5.6-.7 1.6-.7 3v13.8Zm4.9-.4v-.5l1.7-.1c.4-.2.7-.4.8-.8.2-.3.2-1 .2-1.7V10.3c0-.8 0-1.3-.2-1.7-.1-.3-.4-.6-.8-.7a5 5 0 0 0-1.7-.2v-.5H240c.2 0 .3.1.3.3V10l.1 1.8-.2.1-.2-.1a5 5 0 0 0-1.6-2.8 4 4 0 0 0-2.8-1.2h-.9c-.7 0-1.3 0-1.7.2-.3.2-.6.4-.7.8l-.2 1.6v11.5c0 .7 0 1.3.2 1.6.1.4.4.7.7.8l1.7.2h1.4c1.1 0 2.1-.4 3-1.3 1-.8 1.6-1.9 2-3.2h.4a48 48 0 0 0-.4 5l-.4.1h-14.1Zm11.8-8.2-1.7-.2c-1-.2-3-.2-5.8-.2v-.9a56.5 56.5 0 0 0 7.5-.4c.2 0 .2.3.2.9 0 .5 0 .8-.2.8Zm14 7.7c.1 0 .2.1.2.3l-.1.2h-8.3v-.5l1.8-.1c.4-.2.6-.4.8-.8l.2-1.7V10.3c0-.8 0-1.3-.2-1.7-.2-.3-.4-.6-.8-.7-.3-.2-1-.2-1.7-.2l-.1-.3v-.2h1.8a46.3 46.3 0 0 0 7-.1 7 7 0 0 1 4 1c.8.6 1.3 1.5 1.3 2.7 0 1-.3 2-1 2.9-.6.9-1.5 1.6-2.6 2.1s-2.3.8-3.7.8c-.8 0-1.5 0-2-.2l-.1-.8a9 9 0 0 0 2.4.3c1.5 0 2.6-.4 3.1-1 .6-.7 1-1.7 1-3 0-2.8-1.2-4.2-3.4-4.2-1 0-1.5.2-1.8.6-.3.3-.4 1-.4 2V22c0 .8 0 1.4.2 1.7.1.4.4.6.7.8l1.8.1Zm11.5 0v.5h-5c-.4 0-1.2-.8-2.4-2.4a74.8 74.8 0 0 1-4-6.4l2.3-.8a71 71 0 0 0 3.7 5.5c1 1.3 1.9 2.3 2.7 2.8.8.6 1.7.8 2.7.8Z" fill="#000"/><path d="M2 33.4c79.7 34.6 122.6 18.2 191.9 4 62.8-12.8 71.2 6.6 70 4.2M2 33.4 1 33m1 .4L3 30" stroke="#000" stroke-width="2"/><path d="M2 29.4c79.7 34.6 122.6 18.2 191.9 4 62.8-12.8 71.1 6.1 70 4.2l.1 4.4" stroke="#000" stroke-width="2"/>
            </svg>

            <div class="mt-12 ">
                <h2 class="text-2xl md:text-3xl font-semibold mb-4 sm:max-w-sm">La forma más Simple de Enviar dinero entre Brasil y Venezuela</h2>
                <p class="max-w-md">Descomplica tus envíos de Dinero a Venezuela con nosotros. Tambien puedes recibir transferencias desde Venezuela con nosotros a tu Pix.</p>
            </div>
        </div>
    

        <?php if(isset($infosite["whatsapp_number"])) : ?>
            
            <a  target="_blank" href="https://wa.me/<?= $infosite["whatsapp_number"] ?>?text=<?= $encoded_message ?>" 
            aria-label="Realizar envio de dinero" 
            class="animate-on-viewport text-xl flex items-center p-4 gap-4  w-fit text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                    <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                </svg>    
            Escribenos
            </a>
        <?php endif ?>
    
    </div>


    </section>
    <section>

        
        
        
        
            
        <div class="mt-6 w-full max-w-5xl mx-auto bg-green-300 rounded-xl px-8 pt-8 flex flex-col-reverse md:flex-row justify-between items-center gap-4">
            <img class="animate-on-viewport w-full max-w-sm bottom-0" src="/static/money.png" alt="dinero">
            <div class="max-w-sm mb-8 flex flex-col gap-4">
                <h2 class="text-2xl lg:text-4xl font-medium">Envía y recibe dinero</h2>
                <p class="text-lg">Usa tu Pix o Transferencias Bancarias</p>
                <img class="w-1/2 rounded-md overflow-hidden" src="/static/pix.jpg" alt="pix">


                <p class="text-lg">En Venezuela trabajamos con transferencias bancarias, PagomóvilBDV y Tpago.</p>
                <div class="flex gap-2">
                    <img class="w-1/2 rounded-md overflow-hidden" src="/static/bdv.jpg" alt="banco de venezuela">
                    <img class="w-1/2 rounded-md overflow-hidden" src="/static/mercantil.jpg" alt="banco mercantil">
                </div>

            </div>

        </div>
    </section>

    <section >
        <div class="mt-10 w-fit max-w-md text-center mx-auto">
            <h2 class="text-3xl font-medium">Calculadora de Cambios</h2>
            <p class="mt-4">Usa nuestra calculadora para saber exactamente cuanto dinero recibirá la persona a quien le envíes dinero</p>
        </div>

        <!-- CALCULATOR RECTANGLE -->
        <div id="calculator" class="mt-6 w-full max-w-5xl mx-auto bg-green-300 rounded-xl p-8 mb-6 gap-6 flex flex-col">
    
        <?php require base_path("views/partials/modal.partial.php"); ?>

            
            <!-- INPUT ROW -->
            <div class="w-full flex flex-col sm:flex-row justify-between items-center gap-4">
            
                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Envias</label>
                    <div class="flex">
                        <div class="flex gap-3  items-center p-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <img class="bg-gray-500 rounded-full shadow-lg object-fit size-12" id="base_image" src="" alt="" />
                            <span class="base_symbol text-xl"></span>
                        </div>
                        <input id="base-currency-input" type="number" min="1"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    </div>
                </div>

                <!-- ARROWS -->
                <svg class="hidden sm:block mt-6" width="25" height="34" viewBox="0 0 25 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.3848 1.11463C18.1501 0.879909 17.8317 0.748047 17.4998 0.748047C17.1679 0.748047 16.8495 0.879909 16.6148 1.11463C16.3801 1.34934 16.2482 1.66769 16.2482 1.99963C16.2482 2.33157 16.3801 2.64991 16.6148 2.88463L20.7323 6.99963H1.24979C0.918273 6.99963 0.60033 7.13132 0.36591 7.36574C0.131489 7.60016 -0.000206828 7.91811 -0.000206828 8.24963C-0.000206828 8.58115 0.131489 8.89909 0.36591 9.13351C0.60033 9.36793 0.918273 9.49963 1.24979 9.49963H20.7323L16.6148 13.6146C16.4986 13.7308 16.4064 13.8688 16.3435 14.0207C16.2806 14.1725 16.2482 14.3353 16.2482 14.4996C16.2482 14.664 16.2806 14.8267 16.3435 14.9786C16.4064 15.1304 16.4986 15.2684 16.6148 15.3846C16.731 15.5008 16.869 15.593 17.0208 15.6559C17.1727 15.7188 17.3354 15.7512 17.4998 15.7512C17.6642 15.7512 17.8269 15.7188 17.9788 15.6559C18.1306 15.593 18.2686 15.5008 18.3848 15.3846L24.6348 9.13463C24.7512 9.01851 24.8436 8.88057 24.9066 8.72871C24.9696 8.57685 25.002 8.41404 25.002 8.24963C25.002 8.08521 24.9696 7.92241 24.9066 7.77054C24.8436 7.61868 24.7512 7.48074 24.6348 7.36463L18.3848 1.11463ZM8.38479 20.3846C8.50101 20.2684 8.5932 20.1304 8.6561 19.9786C8.719 19.8267 8.75137 19.664 8.75137 19.4996C8.75137 19.3353 8.719 19.1725 8.6561 19.0207C8.5932 18.8688 8.50101 18.7308 8.38479 18.6146C8.26857 18.4984 8.1306 18.4062 7.97875 18.3433C7.8269 18.2804 7.66415 18.248 7.49979 18.248C7.33543 18.248 7.17268 18.2804 7.02083 18.3433C6.86899 18.4062 6.73101 18.4984 6.61479 18.6146L0.364793 24.8646C0.248385 24.9807 0.156028 25.1187 0.0930119 25.2705C0.0299957 25.4224 -0.00244141 25.5852 -0.00244141 25.7496C-0.00244141 25.914 0.0299957 26.0768 0.0930119 26.2287C0.156028 26.3806 0.248385 26.5185 0.364793 26.6346L6.61479 32.8846C6.84951 33.1193 7.16785 33.2512 7.49979 33.2512C7.83173 33.2512 8.15008 33.1193 8.38479 32.8846C8.61951 32.6499 8.75137 32.3316 8.75137 31.9996C8.75137 31.6677 8.61951 31.3493 8.38479 31.1146L4.26729 26.9996H23.7498C24.0813 26.9996 24.3993 26.8679 24.6337 26.6335C24.8681 26.3991 24.9998 26.0811 24.9998 25.7496C24.9998 25.4181 24.8681 25.1002 24.6337 24.8657C24.3993 24.6313 24.0813 24.4996 23.7498 24.4996H4.26729L8.38479 20.3846Z" fill="currentColor"/>
                </svg>
                <svg class="block sm:hidden" width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M23.7124 25.1C23.5836 25.257 23.4215 25.3834 23.2378 25.4699C23.0541 25.5565 22.8534 25.6011 22.6504 25.6004C22.4738 25.6016 22.2987 25.5671 22.1357 25.499C21.9728 25.431 21.8252 25.3308 21.7018 25.2044L16.2946 19.79C16.0418 19.5369 15.8998 19.1938 15.8998 18.836C15.8998 18.4783 16.0418 18.1351 16.2946 17.882C16.5477 17.6292 16.8908 17.4872 17.2486 17.4872C17.6063 17.4872 17.9494 17.6292 18.2026 17.882L21.3004 20.9996V1.75042C21.3004 1.39238 21.4426 1.049 21.6958 0.795823C21.949 0.542649 22.2923 0.400418 22.6504 0.400418C23.0084 0.400418 23.3518 0.542649 23.605 0.795823C23.8581 1.049 24.0004 1.39238 24.0004 1.75042V20.9816L27.1 17.8892C27.353 17.637 27.6958 17.4953 28.0531 17.4953C28.4104 17.4953 28.7531 17.637 29.0062 17.8892C29.259 18.1423 29.401 18.4855 29.401 18.8432C29.401 19.201 29.259 19.5441 29.0062 19.7972L23.7124 25.1ZM8.41237 0.900818C8.28359 0.743818 8.12147 0.617457 7.93778 0.530904C7.75409 0.444352 7.55343 0.399778 7.35037 0.400418C7.17376 0.399285 6.99873 0.433768 6.83574 0.501808C6.67276 0.569848 6.52516 0.670047 6.40177 0.796418L0.996375 6.21082C0.743564 6.46394 0.601562 6.80707 0.601562 7.16482C0.601562 7.52257 0.743564 7.86569 0.996375 8.11882C1.2495 8.37163 1.59262 8.51363 1.95037 8.51363C2.30813 8.51363 2.65125 8.37163 2.90437 8.11882L6.00037 5.00302V24.2504C6.00037 24.6085 6.14261 24.9518 6.39578 25.205C6.64895 25.4582 6.99233 25.6004 7.35037 25.6004C7.70842 25.6004 8.05179 25.4582 8.30497 25.205C8.55814 24.9518 8.70037 24.6085 8.70037 24.2504V5.01922L11.8 8.11162C12.053 8.36388 12.3958 8.50553 12.7531 8.50553C13.1104 8.50553 13.4531 8.36388 13.7062 8.11162C13.959 7.85849 14.101 7.51537 14.101 7.15762C14.101 6.79987 13.959 6.45674 13.7062 6.20362L8.41237 0.900818Z" fill="currentColor"/>
                </svg>

                <div class="w-full">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recibes</label>
                    <div class="flex">
                        <div class="flex gap-3  items-center p-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                            <img class="bg-gray-500 rounded-full shadow-lg object-fit size-12" id="target_image" src="" alt="" />
                            <span class="target_symbol text-xl"></span>
                        </div>
                    
                        <input id="target-currency-input" type="number" min="1"
                            class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    </div>
                </div>
            </div>

            <!-- DETAILS ROW -->
            <div class="w-full flex flex-col sm:flex-row justify-between items-center gap-4">
                <div>
                    <p class="mb-4 font-semibold text-xl">
                        <span class="base_symbol"></span>
                        <span id="base_amount"></span>
                        <span> = </span>
                        <span class="target_symbol"></span>
                        <span id="target_amount"></span>
                    </p>
                    <p class="text-sm">Valor Actualizado el <span id="updated_at"></span></p>
                </div>

                <?php if(isset($infosite["whatsapp_number"])) : ?>
                <p class="w-fit mt-6">
                    <a class="flex items-center p-4 gap-4 rounded-full bg-green-800 text-white" 
                    target="_blank" href="https://wa.me/<?= $infosite["whatsapp_number"] ?>?text=<?= $encoded_message ?>" aria-label="Realizar envio de dinero">
                        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                            <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                        </svg>
                        <span>Quiero enviar dinero</span>
                    </a>
                </p>
                <?php endif ?>
            </div>
        </div>

    </section>
    

</main>

<script>
    document.addEventListener("DOMContentLoaded", () => {

    let options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.5,
    };

    const targets = document.querySelectorAll(".animate-on-viewport");

    const callback = function (entries, observer) {
        entries.forEach((entry) => {
    
        if (entry.isIntersecting) {
            entry.target.classList.add("show");
        } else {
            entry.target.classList.remove("show");
        }

    });
};

    let observer = new IntersectionObserver(callback, options);
    targets.forEach((target) => observer.observe(target));
})
    
</script>

<?php require base_path("views/partials/footer.partial.php"); ?>

