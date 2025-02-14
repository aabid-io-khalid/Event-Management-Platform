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

</head>

<body>

  <!-- start header  -->
  <?php require_once "header.php" ?>
  <!-- end header  -->

  <!-- side bar start  -->
  <?php require_once "sideBar.php" ?>
  <!-- side bar end  -->




  <!-- body Start -->
    <!-- body Start -->
    <section class="home-grid">
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="rounded-md bg-indigo-500 p-4">
                <i class="fas fa-users text-white text-2xl"></i>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-base font-medium text-gray-500 truncate">Total User</dt>
                <dd class="text-2xl font-semibold text-gray-900"><?= $statistique['nombreUtilisateurs'] ?></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="rounded-md bg-green-500 p-4">
                <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-base font-medium text-gray-500 truncate">Total Organisateur </dt>
                <dd class="text-2xl font-semibold text-gray-900"><?= $statistique['nombreOrganisateur'] ?></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white overflow-hidden shadow rounded-lg">
        <div class="p-5">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <div class="rounded-md bg-purple-500 p-4">
                <i class="fas fa-user-tie text-white text-2xl"></i>
              </div>
            </div>
            <div class="ml-5 w-0 flex-1">
              <dl>
                <dt class="text-base font-medium text-gray-500 truncate">Total Events</dt>
                <dd class="text-2xl font-semibold text-gray-900"><?= $statistique['nombreEvenements'] ?></dd>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Organizers -->
    <div class="mt-8">
      <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
          <div class="flex items-center">
            <i class="fas fa-user-clock text-yellow-500 text-2xl mr-3"></i>
            <h3 class="text-xl leading-6 font-medium text-gray-900">Validations En Attente</h3>
          </div>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-lg font-medium bg-yellow-100 text-yellow-800">
            <?= count($users) ?> en attente
          </span>
        </div>
        <div class="border-t border-gray-200">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Email</th>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                  <th class="px-6 py-3 text-right text-base font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($users as $user) : ?>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4"><?= $user['nom'] ?></td>
                  <td class="px-6 py-4"><?= $user['email'] ?></td>
                  <td class="px-6 py-4">
                    <span class="px-3 py-1 inline-flex text-base leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      En attente
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-lg font-medium">
                    <form class="inline-flex space-x-2" >
                      <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                      <a href="home?action=unbanUser&id=<?= $user['id'] ?>" class="px-4 py-2 bg-green-600 text-white rounded-md">Approuver</a>
                      <a href="home?action=banUser&id=<?= $user['id'] ?>" class="px-4 py-2 bg-red-600 text-white rounded-md">Refuser</a>
                    </form>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Events -->
    <div class="mt-8">
      <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6 flex justify-between items-center">
          <div class="flex items-center">
            <i class="fas fa-book text-blue-500 text-2xl mr-3"></i>
            <h3 class="text-xl leading-6 font-medium text-gray-900">Events En Attente</h3>
          </div>
          <span class="inline-flex items-center px-3 py-1 rounded-full text-lg font-medium bg-blue-100 text-blue-800">
            <?= count($events) ?> en attente
          </span>
        </div>
        <div class="border-t border-gray-200">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Titre</th>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Organisateur</th>
                  <th class="px-6 py-3 text-left text-base font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                  <th class="px-6 py-3 text-right text-base font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($events as $event) : ?>
                <tr class="hover:bg-gray-50">
                  <td class="px-6 py-4"><?= $event['titre'] ?></td>
                  <td class="px-6 py-4"><?= $event['organisateur'] ?></td>
                  <td class="px-6 py-4">
                    <span class="px-3 py-1 inline-flex text-base leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                      En attente
                    </span>
                  </td>
                  <td class="px-6 py-4 whitespace-nowrap text-right text-lg font-medium">
                    <form class="inline-flex space-x-2" >
                      <input type="hidden" name="event_id" value="<?= $event['id'] ?>">
                      <a href="home?action=approveEvent&id=<?= $event['id'] ?>" class="px-4 py-2 bg-green-600 text-white rounded-md">Accepter</a>
                      <a href="home?action=rejectEvent&id=<?= $event['id'] ?>" class="px-4 py-2 bg-red-600 text-white rounded-md">Refuser</a>
                    </form>
                  </td>
                </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- body end -->











  <!-- start footer -->
  
  <!-- end footer -->
  <!-- custom js file link  -->
  <script src="../js/script.js"></script>


</body>

</html>