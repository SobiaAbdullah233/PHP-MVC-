<html>
    <head>
        <title>Teachers</title>
    </head>
    <body>
        <h1>Teachers</h1>

        <table border=1>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['data'] as $teacher): ?>
                    <tr>
                        <td><?= $teacher->first_name ?>
                        <td><?= $teacher->last_name ?>
                        <td><?= $teacher->department ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </body>
</html>