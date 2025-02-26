<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 class="text-2xl font-bold mb-4">Expense List</h2>
<a href="index.php?action=add" class="text-blue-500 underline mb-4 inline-block">Add New Expense</a>

<table class="min-w-full mt-4 table-auto border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="px-4 py-2 text-left">Category</th>
            <th class="px-4 py-2 text-left">Amount</th>
            <th class="px-4 py-2 text-left">Date</th>
            <th class="px-4 py-2 text-left">Description</th>
            <th class="px-4 py-2 text-left">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($expenses as $expense): ?>
            <tr class="border-b">
                <td class="px-4 py-2"><?php echo htmlspecialchars($expense->category_name); ?></td>
                <td class="px-4 py-2"><?php echo number_format($expense->amount, 2); ?></td>
                <td class="px-4 py-2"><?php echo $expense->date; ?></td>
                <td class="px-4 py-2"><?php echo htmlspecialchars($expense->description); ?></td>
                <td class="px-4 py-2">
                    <a href="index.php?action=edit&id=<?php echo $expense->id; ?>" class="text-yellow-500 hover:underline">Edit</a> |
                    <a href="index.php?action=delete&id=<?php echo $expense->id; ?>" class="text-red-500 hover:underline">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>