<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>

  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- custom css file link  -->
  <link rel="stylesheet" href=" ../css/style2.css">

</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->




  <!-- body Start -->
  <section >
    <div class="max-w-[80%] mx-auto px-4">
        <!-- Header with Actions -->
        <div class="flex justify-between items-center mb-6">
            <button class="text-white hover:opacity-80 transition-opacity flex items-center gap-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Back
            </button>
            <div class="flex gap-3">
                <button class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit
                </button>
                <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                    Delete
                </button>
            </div>
        </div>

        <!-- Event Details Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Event Image -->
            <div class="relative h-64">
                <img src="/api/placeholder/800/400" alt="Event Image" class="w-full h-full object-cover">
                <div class="absolute top-4 right-4">
                    <span class="px-4 py-2 bg-purple-100 text-[#8e44ad] rounded-full font-semibold">$299</span>
                </div>
            </div>

            <!-- Event Information -->
            <div class="p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">Tech Conference 2025</h1>
                    <p class="text-purple-600">Technology • Conference</p>
                </div>

                <div class="grid grid-cols-2 gap-6 mb-6">
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Date & Time</p>
                        <div class="flex items-center gap-2 text-gray-800">
                            <svg class="w-5 h-5 text-[#8e44ad]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            March 15, 2025
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Location</p>
                        <div class="flex items-center gap-2 text-gray-800">
                            <svg class="w-5 h-5 text-[#8e44ad]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            </svg>
                            San Francisco, CA
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Capacity</p>
                        <div class="flex items-center gap-2 text-gray-800">
                            <svg class="w-5 h-5 text-[#8e44ad]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                            500 Attendees
                        </div>
                    </div>
                    <div>
                        <p class="text-gray-500 text-sm mb-1">Status</p>
                        <div class="flex items-center gap-2 text-green-600">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Active
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-200 pt-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4">Description</h2>
                    <p class="text-gray-600">
                        Join us for the most innovative tech conference of 2025! This three-day event brings together industry leaders, 
                        developers, and tech enthusiasts for an unforgettable experience.
                    </p>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal (Hidden by default) -->
        <div class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
            <div class="bg-white rounded-xl p-6 max-w-md w-full mx-4">
                <h3 class="text-xl font-bold text-gray-800 mb-4">Delete Event?</h3>
                <p class="text-gray-600 mb-6">Are you sure you want to delete this event? This action cannot be undone.</p>
                <div class="flex justify-end gap-4">
                    <button class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                        Cancel
                    </button>
                    <button class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors">
                        Delete Event
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>











  <!-- start footer -->
  
  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>


</body>

</html>