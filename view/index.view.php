<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense Tracker</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" />
    <!-- Add Toastify CSS -->
<link href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" rel="stylesheet">

<!-- Add Toastify JS -->
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- Include jQuery (necessary for validation) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Include jQuery Validation Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>
<style>

    

    
</style>


</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-6">

    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-5xl">
        
        <!-- App Title -->
        <h1 class="text-3xl font-bold text-center text-indigo-700 mb-6">💰 Expense Tracker</h1>

        <!-- Summary Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            <div class="bg-yellow-200 p-4 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold text-gray-800">Highest Monthly Expense</h3>
                <p class="text-xl font-bold text-red-600">₹<?= $highestamount ?></p>
            </div>
            <div class="bg-green-200 p-4 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold text-gray-800">Total Expense</h3>
                <p class="text-xl font-bold text-green-700">₹<?= $totalamount ?></p>
            </div>
            <div class="bg-blue-200 p-4 rounded-lg shadow-md text-center">
                <h3 class="text-lg font-semibold text-gray-800">Monthly Expense</h3>
                <p class="text-xl font-bold text-blue-700">₹<?=  $monthlyamount ?></p>
            </div>
        </div>

        <!-- Buttons -->
        <div class="flex justify-center space-x-4 mb-6">
            <!-- Add Group Button -->
            <button data-modal-target="addGroupModal" data-modal-toggle="addGroupModal" class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                + Add Group
            </button>
            <!-- Add Expense Button -->
            <button data-modal-target="addExpenseModal" data-modal-toggle="addExpenseModal" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
                + Add Expense
            </button>
        </div>

        <!-- Group Table -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md mb-6 border border-gray-300">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Expense Groups</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-purple-500 text-white p-2">
                    
                        <th class="border border-gray-300 p-2">Group Name</th>
                        <th class="border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach($groups as $group): ?>
                        
                    <tr>
                      
                        <td class="border border-gray-300 p-2"><?= $group['name'] ?></td>
                        <td class="border border-gray-300 p-2">
                            <div class="flex space-x-2 justify-center">
                                <!-- Edit Button -->
                                <button data-modal-target="editGroupModal<?= $group['grp_id'] ?>" data-modal-toggle="editGroupModal<?= $group['grp_id'] ?>" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow-md transition-all">
                                    Edit
                                </button>
                                
                                <!-- Delete Button -->
                                <button data-modal-target="deleteModal" data-modal-toggle="deleteModal"  class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md transition-all">
                                        Delete
                                    </button>
                               
                            </div>
                        </td>
                    </tr>
</div>
                    <!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-700 mb-4">Are you sure you want to delete this item?</p>
         
                <div class="flex justify-end space-x-4">
                    <button class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</button>
                    <form action="/group" method="POST">
                                    <input type="hidden" name="groupid" value="<?= $group['grp_id']?>" >
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md transition-all">
                                        Delete
                                    </button>
                                </form>
                
        </div>
    </div>
</div>
                    <!-- Edit Group Modal -->
                    <div id="editGroupModal<?= $group['grp_id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Group</h2>
                                <form action="/editgroup" method="POST">
                                    <input type="hidden" name="_method" value="PATCH" >
                                    <input type="hidden" name="grp_id" value="<?= $group['grp_id'] ?>" >

                                    <input type="text" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Group Name" name="name" value="<?= $group['name'] ?>" required>
                                    
                                    <div class="flex justify-end space-x-4">
                                        <button data-modal-hide="editGroupModal<?= $group['grp_id'] ?>" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</button>
                                        <button  data-modal-hide="editGroupModal" type="submit" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Expense Table -->
        <div class="bg-gray-50 p-4 rounded-lg shadow-md border border-gray-300">
            <h2 class="text-lg font-semibold text-gray-700 mb-2">Expense List</h2>
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-blue-500 text-white">
                      
                        <th class="border border-gray-300 p-2">Amount</th>
                        <th class="border border-gray-300 p-2">Description</th>
                        <th class="border border-gray-300 p-2">Date</th>
                        <th class="border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($expenses as $expense): ?>
                    <tr>
                        
                        <td class="border border-gray-300 p-2"><?= $expense['amount'] ?></td>
                        <td class="border border-gray-300 p-2"><?= $expense['description'] ?></td>
                        <td class="border border-gray-300 p-2"><?= $expense['date'] ?></td>
                        <td class="border border-gray-300 p-2">
                            <div class="flex space-x-2 justify-center">
                                <!-- Edit Button -->
                                <button data-modal-target="editExpenseModal<?= $expense['id'] ?>" data-modal-toggle="editExpenseModal<?= $expense['id'] ?>" class="px-4 py-2 text-white bg-blue-500 hover:bg-blue-600 rounded-lg shadow-md transition-all">
                                    Edit
                                </button>

                                <!-- Delete Button -->
                                
                                <button data-modal-target="deleteexpense" data-modal-toggle="deleteexpense"  class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md transition-all">
                                        Delete
                                    </button>
                                
                            </div>
                        </td>
                    </tr>

                    <div id="deleteexpense" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Confirm Deletion</h2>
            <p class="text-gray-700 mb-4">Are you sure you want to delete this item?</p>
         
                <div class="flex justify-end space-x-4">
                    <a href="/" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</a>
                    <form action="/expensedestroy" method="POST">
                                    <input type="hidden" name="id" value="<?= $expense['id']?>" >
                                    <button type="submit" class="px-4 py-2 text-white bg-red-500 hover:bg-red-600 rounded-lg shadow-md transition-all">
                                        Delete
                                    </button>
                                </form>
                
        </div>
    </div>
</div>

                    <!-- Edit Expense Modal -->
                    <div id="editExpenseModal<?= $expense['id'] ?>" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-md max-h-full">
                            <div class="relative bg-white rounded-lg shadow-lg p-6">
                                <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Expense</h2>
                                <form action="/expenseupdate" method="POST">
                                <input type="hidden" name="_method" value="PATCH" >
                                <input type="hidden" name="id" value="<?= $expense['id'] ?>" >
                                    <select name="groupid" id="group_id" class="w-full border border-gray-300 p-2 rounded-lg mb-2">
                                        <option value="">Select Group</option>
                                        <?php foreach($groups as $group): ?>
                                        <option value="<?= $group['grp_id'] ?>" <?= $expense['groupid'] == $group['grp_id'] ? 'selected' : '' ?>><?= $group['name'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="number" class="w-full border border-gray-300 p-2 rounded-lg mb-2" placeholder="Amount" name="amount" value="<?= $expense['amount'] ?>" required>
                                    <input type="text" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Description" name="description" value="<?= $expense['description'] ?>" required>
                                    <input type="date" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Date" name="date" value="<?= $expense['date'] ?>" required>
                                    <input type="hidden" name="id" value="<?= $expense['id'] ?>">
                                    <div class="flex justify-end space-x-4">
                                        <button data-modal-hide="editExpenseModal<?= $expense['id'] ?>" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</button>
                                        <button type="submit" data-modal-hide="editExpenseModal" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg" type="submit">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Add Group Modal -->
        <div id="addGroupModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Group</h2>
                    <form action="/groups" method="POST">
                        <input type="text" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Enter group name" name="name" id="name">
                    
                  
                            <button data-modal-hide="addGroupModal" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded-lg" type="submit">Save</button>
                            <a href="/" data-modal-hide="addGroupModal" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</a>
                    </form>


                </div>
            </div>
        </div>

        <!-- Add Expense Modal -->
        <div id="addExpenseModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Add New Expense</h2>
                    <form action="/expense" method="POST">
                        <select name="groupid" id="group_id" class="w-full border border-gray-300 p-2 rounded-lg mb-2">
                            <option value="">Select Group</option>
                            <?php foreach($groups as $group): ?>
                            <option value="<?= $group['grp_id'] ?>"><?= $group['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <input type="number" class="w-full border border-gray-300 p-2 rounded-lg mb-2" placeholder="Amount" name="amount" >
                        <input type="text" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Description" name="description" >
                        <input type="date" class="w-full border border-gray-300 p-2 rounded-lg mb-4" placeholder="Date" name="date" >
                        <div class="flex justify-end space-x-4">
     
                            <button class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg" type="submit">Save</button>
                        </form>
                        <a href="/" data-modal-hide="addExpenseModal" class="bg-gray-400 hover:bg-gray-500 text-white py-2 px-4 rounded-lg">Cancel</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
    


<?php if(isset($errors['name'])) { ?>
<?php
    // Output a JavaScript block to show the Toastify message
    echo "<script type='text/javascript'>
            Toastify({
                text: '$errors[name]', // Error message
                backgroundColor: 'linear-gradient(to right, #FF5F6D, #FFC371)', // Red gradient for error
                duration: 3000 // Show for 3 seconds
            }).showToast();
          </script>";
?>
<?php } ?>     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</body>
</html>
