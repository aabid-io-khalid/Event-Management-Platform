<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ticket</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href="../css/style2.css">

</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->




  <!-- body Start -->
  <div class="bg-white rounded-2xl shadow-xl border border-[#9754b3]/10 m-4">
    <!-- Informations de l'événement -->
    <div class="p-6 border-b border-gray-200">
        <h2 class="text-2xl font-semibold text-[#9754b3] mb-4">Festival de Musique 2024</h2>
        <div class="grid grid-cols-2 gap-4 text-lg">
            <div>
                <span class="text-gray-600">Date:</span>
                <span class="ml-2 text-gray-800">15 Juin 2024</span>
            </div>
            <div>
                <span class="text-gray-600">Lieu:</span>
                <span class="ml-2 text-gray-800">Paris</span>
            </div>
        </div>
    </div>
    <!-- Configuration du ticket -->
    <div class="p-6">
        <h3 class="text-xl font-medium text-gray-800 mb-6">Configuration du ticket</h3>
        
        <!-- Type de ticket -->
        <div class="mb-8">
            <label class="text-lg font-medium text-gray-700 mb-4 block">Type d'accès</label>
            <div class="flex gap-4">
                <label class="flex-1 relative">
                    <input type="radio" name="ticketType" value="gratuit" class="peer sr-only ticket-type-radio">
                    <div class="p-4 text-center border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-[#9754b3] peer-checked:bg-purple-50 peer-checked:text-[#9754b3] text-lg">
                        Gratuit
                    </div>
                </label>
                <label class="flex-1 relative">
                    <input type="radio" name="ticketType" value="payant" class="peer sr-only ticket-type-radio" checked>
                    <div class="p-4 text-center border-2 border-gray-200 rounded-xl cursor-pointer peer-checked:border-[#9754b3] peer-checked:bg-purple-50 peer-checked:text-[#9754b3] text-lg">
                        Payant
                    </div>
                </label>
            </div>
        </div>
        <!-- Prix -->
        <div class="mb-8 price-section">
            <label class="text-lg font-medium text-gray-700 mb-4 block">Prix du ticket</label>
            <div class="flex items-center gap-4">
                <div class="relative flex-1">
                    <input type="number" class="w-full p-4 text-xl border-2 border-gray-200 rounded-xl focus:border-[#9754b3] focus:ring focus:ring-purple-200" value="50">
                    <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xl text-gray-500">€</span>
                </div>
            </div>
        </div>
        <!-- Capacité -->
      
    </div>
    <!-- Actions -->
    <div class="p-6 bg-gray-50 rounded-b-2xl flex justify-end gap-4">
        <button class="px-6 py-3 border-2 border-gray-300 rounded-xl text-lg text-gray-700 hover:bg-gray-100 transition-all">
            Annuler
        </button>
        <button class="px-8 py-3 bg-[#9754b3] text-white rounded-xl text-lg hover:bg-purple-700 transition-all">
            Enregistrer
        </button>
    </div>
</div>
  <!-- body end -->











  <!-- start footer -->
  
  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
    const radioButtons = document.querySelectorAll('.ticket-type-radio');
    const priceSection = document.querySelector('.price-section');
    const capacitySection = document.querySelector('.capacity-section');

    function toggleSections(isGratuit) {
        if (isGratuit) {
            priceSection.style.display = 'none';
            capacitySection.style.display = 'none';
        } else {
            priceSection.style.display = 'block';
            capacitySection.style.display = 'block';
        }
    }

    radioButtons.forEach(radio => {
        radio.addEventListener('change', (e) => {
            toggleSections(e.target.value === 'gratuit');
        });
    });

    // Initialize state based on default checked radio
    const checkedRadio = document.querySelector('.ticket-type-radio:checked');
    if (checkedRadio) {
        toggleSections(checkedRadio.value === 'gratuit');
    }
});
</script>

</body>

</html>