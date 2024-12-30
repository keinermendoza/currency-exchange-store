<!-- Modal toggle -->
<button id="button-open-modal" data-modal-target="select-modal" data-modal-toggle="select-modal" 
class="w-fit underline underline-offset-4 text-green-800 hover:text-green-950" type="button">
  Elegir otras monedas
</button>

<!-- Main modal -->
<div id="select-modal" tabindex="-1" aria-hidden="true" class="hidden bg-black bg-opacity-70 overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Opciones de Cambio
                </h3>
                <button id="button-close-modal" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="select-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Cerrar modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5">
                <p class="text-gray-500 dark:text-gray-400 mb-4">Elige el cambio que deseas</p>
                <ul class="space-y-4 mb-4">
                    <?php foreach($exchanges as $option): ?>
                    <li>
                        <input type="radio" id="option-<?= $option['id'] ?>" value="<?= $option['id'] ?>" name="selectedExchange" class="hidden peer exchange-option" />
                        <label for="option-<?= $option['id'] ?>" class="inline-flex items-center justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                            <div class="w-full text-lg flex gap-1 items-center justify-between">
                                <span>de</span>
                                <div class="flex gap-1 items-center">
                                    <img class=" bg-gray-500 rounded-full shadow-lg object-fit size-8" id="" src="<?= $option["base_image"] ?>" alt="" />
                                    <span class=" "><?= $option["base_name"] ?></span>
                                </div>
                                <svg class="size-6" width="25" height="34" viewBox="0 0 25 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.3848 1.11463C18.1501 0.879909 17.8317 0.748047 17.4998 0.748047C17.1679 0.748047 16.8495 0.879909 16.6148 1.11463C16.3801 1.34934 16.2482 1.66769 16.2482 1.99963C16.2482 2.33157 16.3801 2.64991 16.6148 2.88463L20.7323 6.99963H1.24979C0.918273 6.99963 0.60033 7.13132 0.36591 7.36574C0.131489 7.60016 -0.000206828 7.91811 -0.000206828 8.24963C-0.000206828 8.58115 0.131489 8.89909 0.36591 9.13351C0.60033 9.36793 0.918273 9.49963 1.24979 9.49963H20.7323L16.6148 13.6146C16.4986 13.7308 16.4064 13.8688 16.3435 14.0207C16.2806 14.1725 16.2482 14.3353 16.2482 14.4996C16.2482 14.664 16.2806 14.8267 16.3435 14.9786C16.4064 15.1304 16.4986 15.2684 16.6148 15.3846C16.731 15.5008 16.869 15.593 17.0208 15.6559C17.1727 15.7188 17.3354 15.7512 17.4998 15.7512C17.6642 15.7512 17.8269 15.7188 17.9788 15.6559C18.1306 15.593 18.2686 15.5008 18.3848 15.3846L24.6348 9.13463C24.7512 9.01851 24.8436 8.88057 24.9066 8.72871C24.9696 8.57685 25.002 8.41404 25.002 8.24963C25.002 8.08521 24.9696 7.92241 24.9066 7.77054C24.8436 7.61868 24.7512 7.48074 24.6348 7.36463L18.3848 1.11463ZM8.38479 20.3846C8.50101 20.2684 8.5932 20.1304 8.6561 19.9786C8.719 19.8267 8.75137 19.664 8.75137 19.4996C8.75137 19.3353 8.719 19.1725 8.6561 19.0207C8.5932 18.8688 8.50101 18.7308 8.38479 18.6146C8.26857 18.4984 8.1306 18.4062 7.97875 18.3433C7.8269 18.2804 7.66415 18.248 7.49979 18.248C7.33543 18.248 7.17268 18.2804 7.02083 18.3433C6.86899 18.4062 6.73101 18.4984 6.61479 18.6146L0.364793 24.8646C0.248385 24.9807 0.156028 25.1187 0.0930119 25.2705C0.0299957 25.4224 -0.00244141 25.5852 -0.00244141 25.7496C-0.00244141 25.914 0.0299957 26.0768 0.0930119 26.2287C0.156028 26.3806 0.248385 26.5185 0.364793 26.6346L6.61479 32.8846C6.84951 33.1193 7.16785 33.2512 7.49979 33.2512C7.83173 33.2512 8.15008 33.1193 8.38479 32.8846C8.61951 32.6499 8.75137 32.3316 8.75137 31.9996C8.75137 31.6677 8.61951 31.3493 8.38479 31.1146L4.26729 26.9996H23.7498C24.0813 26.9996 24.3993 26.8679 24.6337 26.6335C24.8681 26.3991 24.9998 26.0811 24.9998 25.7496C24.9998 25.4181 24.8681 25.1002 24.6337 24.8657C24.3993 24.6313 24.0813 24.4996 23.7498 24.4996H4.26729L8.38479 20.3846Z" fill="currentColor"/>
                                </svg>
                                <span>a</span>
                                <div class="flex gap-1 items-center">
                                    <img class=" bg-gray-500 rounded-full shadow-lg object-fit size-8" id="" src="<?= $option["target_image"] ?>" alt="" />
                                    <span class=""><?= $option["target_name"] ?></span>
                                </div>
                            </div>
                        </label>
                    </li>
                    <?php endforeach; ?>
                    
                </ul>
               
            </div>
        </div>
    </div>
</div> 


<script>

function transformDate(DateISO) {
    const dateObject = new Date(DateISO);

    const day = String(dateObject.getDate()).padStart(2, '0');
    const month = String(dateObject.getMonth() + 1).padStart(2, '0'); 
    const year = dateObject.getFullYear();

    return `${day}/${month}/${year}`;
}

    document.addEventListener("DOMContentLoaded", () => {

        // Open and Close modal
        const btnOpenModal =  document.getElementById("button-open-modal");
        const btnCloseModal =  document.getElementById("button-close-modal");
        
        const modalContainer = document.getElementById("select-modal");
        
        function toogleModalVisibility() {
            modalContainer.classList.toggle('hidden');
            modalContainer.classList.toggle('flex');
        }

        btnOpenModal.onclick = toogleModalVisibility;
        btnCloseModal.onclick = toogleModalVisibility;

        modalContainer.addEventListener("click", (e) => {
            if (e.target === e.currentTarget) {
                toogleModalVisibility();
            }
        });

        // Calculate exchange value
        let selectedExchange;
        const exchangeData = JSON.parse(document.getElementById("exchanges-json").innerText);
        const preselectedExchange = exchangeData.filter((exchage) => exchage.is_default)[0];
        
        selectedExchange = preselectedExchange;
        
        // fill reference data
        const updated = document.getElementById("updated_at");
        const baseSymbol = Array.from(document.getElementsByClassName("base_symbol"));
        const baseAmount = document.getElementById("base_amount");
        const baseImage = document.getElementById("base_image");

        const targetSymbol = Array.from(document.getElementsByClassName("target_symbol"));
        const targetAmount = document.getElementById("target_amount");
        const targetImage = document.getElementById("target_image");

        const baseInput = document.getElementById("base-currency-input");
        const targetInput = document.getElementById("target-currency-input");

        function fillReferenceData() {
            updated.innerHTML = transformDate(selectedExchange.updated_at); 
            baseSymbol.forEach(spanEl => spanEl.innerHTML = selectedExchange.base_symbol);
            baseAmount.innerHTML =  Math.floor(parseFloat(selectedExchange.base_amount) * 100) / 100; 
            targetSymbol.forEach(spanEl => spanEl.innerHTML = selectedExchange.target_symbol);
            targetAmount.innerHTML =  Math.floor(parseFloat(selectedExchange.target_amount) * 100) / 100;
            baseImage.src = selectedExchange.base_image;
            targetImage.src = selectedExchange.target_image;
        
            baseInput.value = parseFloat(selectedExchange.base_amount);
            targetInput.value = parseFloat(selectedExchange.target_amount);
        }

        fillReferenceData();
        console.log(exchangeData)
        console.log(preselectedExchange)


        // calculate 
        baseInput.oninput = () => {
            const value = Math.floor(selectedExchange.rate * parseFloat(baseInput.value) * 100) / 100;  
            targetInput.value = value;
        }

        targetInput.oninput = () => {
            const value = Math.floor(parseFloat(targetInput.value) / selectedExchange.rate  * 100) / 100;  
            baseInput.value = value;
        }


        // create exchange options 

        // listen for select option
        const exchageOptions = Array.from(document.getElementsByClassName('exchange-option'));

        exchageOptions.forEach(option => {
            option.addEventListener("change", function() {
                if(this.checked) {
                    const exchangeId = this.value;

                    selectedExchange = exchangeData.filter((exchage) => exchage.id == exchangeId)[0];
                    fillReferenceData();
                    toogleModalVisibility();

                }
            });
        });
        
        
            // update selectedExchange
            // call fillReferenceData()
            // close modal

    })
</script>