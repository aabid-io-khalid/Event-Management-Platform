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
  <link rel="stylesheet" href="../css/style2.css">
  <!--  jsPDF Library -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->




  <!-- body Start -->
  <section class="home-grid">
  <div class="mt-8">
      <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
          <div class="flex items-center">
            <i class="fas fa-user-clock text-yellow-500 text-xl mr-3"></i>
            <h3 class="text-lg leading-6 font-medium text-gray-900">Tout User Inscri</h3>
          </div>
        
        </div>
        <div class="border-t border-gray-200">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Enseignant</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            
              
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
            
              <?php foreach ($participants as $participant): ?>
                  <tr class="hover:bg-gray-50">
                      <td class="px-6 py-4 whitespace-nowrap">
                          <div class="flex items-center">
                              <img class="h-16 w-16 rounded-full object-cover"
                                  src="https://ui-avatars.com/api/?name=<?= urlencode($participant['nom']) ?>&background=random"
                                  alt="<?= htmlspecialchars($participant['nom']) ?>">
                              <div class="ml-4">
                                  <div class="text-xl font-medium text-gray-900">
                                      <?= htmlspecialchars($participant['nom']) ?>
                                  </div>
                              </div>
                          </div>
                      </td>
                      <td class="px-6 py-4 whitespace-nowrap">
                          <div class="text-xl text-gray-900">
                              <?= htmlspecialchars($participant['email']) ?>
                          </div>
                      </td>
                  </tr>
              <?php endforeach; ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- PDF Download Button -->
<div class="general-btn text-center">
    <button id="download-pdf-btn" class="btn">Download PDF</button>
</div>
<script>
  document.getElementById('download-pdf-btn').addEventListener('click', function () {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Set font and font size
    doc.setFont('helvetica', 'normal');
    doc.setFontSize(12);

    // Title
    doc.text("User Enrollment List", 10, 10);

    // Start from row 20 to leave space for the title
    let row = 20;

    // Get all table rows
    const rows = document.querySelectorAll('table tbody tr');
    
    // Loop through each row and add data to PDF
    rows.forEach((tr, index) => {
      const cells = tr.querySelectorAll('td');
      const name = cells[0].textContent.trim();  
      const email = cells[1].textContent.trim();  

      // Write name and email to the PDF
      doc.text(`${name} - ${email}`, 10, row);

      // Increment row position
      row += 10;
      
      if (row > 270) {
        doc.addPage();
        row = 10; // Reset row position for the new page
      }
    });

    doc.save('user-enrollment-list.pdf');
  });
</script>
    </div>
  </section>
  <!-- body end -->











  <!-- start footer -->
  
  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>


</body>

</html>