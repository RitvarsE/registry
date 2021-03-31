<html lang="en">
<body>
<h1 class="ml-5">Members</h1>
    <table class="ml-5 table-auto border-4 border-light-blue-500 border-opacity-100">
        <tr>
        <td class="m-8 border-4 border-light-blue-500 border-opacity-100">Name</td>
        <td class="m-8 border-4 border-light-blue-500 border-opacity-100">Person code</td>
        <td class="border-4 border-light-blue-500 border-opacity-100">Age</td>
        <td class="border-4 border-light-blue-500 border-opacity-100">Address</td>
        <td class="border-4 border-light-blue-500 border-opacity-100">Description</td>
        </tr>
        <?php foreach ($persons as $person =>
        ['name' => $name,
                       'code' => $code,
                       'age' => $age,
                       'address' => $address,
                       'description' => $description]): ?>
                <tr>
                    <td class="border-4 border-light-blue-500 border-opacity-100"><?= $name ?></td>
                    <td class="border-4 border-light-blue-500 border-opacity-100"><?= $code ?></td>
                    <td class="border-4 border-light-blue-500 border-opacity-100"><?= $age ?></td>
                    <td class="border-4 border-light-blue-500 border-opacity-100"><?= $address ?></td>
                    <td class="border-4 border-light-blue-500 border-opacity-100"><?= $description ?></td>
                </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>