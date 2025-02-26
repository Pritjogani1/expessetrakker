<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2 class="text-2xl font-bold mb-4"><?php echo isset($expense) ? 'Edit' : 'Add'; ?> Expense</h2>
<form action="index.php?action=<?php echo isset($expense) ? 'update&id=' . $expense->id : 'add'; ?>" method="post">
    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium">Category</label>
        <select name="category_id" id="category_id" class="border rounded px-4 py-2 w-full">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category->id; ?>" <?php echo (isset($expense) && $expense->category_id == $category->id) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($category->name); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="mb-4">
        <label for="amount" class="block text-sm font-medium">Amount</label>
        <input type="text" name="amount" id="amount" value="<?php echo isset($expense) ? $expense->amount : ''; ?>" class="border rounded px-4 py-2 w-full">
    </div>
    <div class="mb-4">
        <label for="date" class="block text-sm font-medium">Date</label>
        <input type="date" name="date" id="date" value="<?php echo isset($expense) ? $expense->date : ''; ?>" class="border rounded px-4 py-2 w-full">
    </div>
    <div class="mb-4">
        <label for="description" class="block text-sm font-medium">Description</label>
        <textarea name="description" id="description" class="border rounded px-4 py-2 w-full"><?php echo isset($expense) ? htmlspecialchars($expense->description) : ''; ?></textarea>
    </div>
    <button type="submit" class="bg-blue-500 text-white rounded px-6 py-2 hover:bg-blue-600">Submit</button>
</form>

    
</body>
</html>