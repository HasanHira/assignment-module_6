<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Content Table</title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="container table-content">
      <table>
        <thead>
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
          </tr>
        </thead>
        <tbody>
          <!-- Load users from CSV file -->
          <?php
            $file = fopen("users.csv", "r");
            while (($data = fgetcsv($file)) !== FALSE) :;
            ?>
              <tr>
                <td><?php echo $data[0]; ?></td>
                <td><?php echo $data[1]; ?></td>
                <td><?php echo $data[2]; ?></td>
              </tr>
            <?php 
            endwhile;
            fclose($file);
          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>