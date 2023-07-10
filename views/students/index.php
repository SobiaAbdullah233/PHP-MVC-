<html>
    <head>
        <title>Students</title>
    </head>
    <body>
        <h1>Students</h1>

        <table border=1>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Class</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['data'] as $student): ?>
                    <tr>
                        <td><?= $student->first_name ?>
                        <td><?= $student->last_name ?>
                        <td><?= $student->classroom ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>