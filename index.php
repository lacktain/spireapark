<!DOCTYPE html>
<html>
  <head>
    <title>SP3 Gjesteparkering</title>
  </head>
  <body>
    <header>
      <h1>SP3 PArkeringsreservasjoner</h1>
    </header>
    <main>
      <form>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"><br><br>
        <label for="parking-space">Parking Space:</label>
        <select id="parking-space" name="parking-space">
          <option value="1">Parkeringsplass 1</option>
          <option value="2">Parkeringsplass 24</option>
        </select><br><br>
        <label for="start-time">Start Time:</label>
        <input type="datetime-local" id="start-time" name="start-time" min="<?php echo date('Y-m-d\TH:i'); ?>" max="<?php echo date('Y-m-d\TH:i', strtotime('+2 weeks')); ?>"><br><br>
        <label for="end-time">End Time:</label>
        <input type="datetime-local" id="end-time" name="end-time" min="<?php echo date('Y-m-d\TH:i'); ?>" max="<?php echo date('Y-m-d\TH:i', strtotime('+2 weeks')); ?>"><br><br>
        <input type="submit" value="Reserver">
      </form>
      <?php
        // Read the file into an array
        $lines = file('reservations.csv');

        // Output the data as a table
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Parking Space</th>';
        echo '<th>Reserved By</th>';
        echo '<th>Start Time</th>';
        echo '<th>End Time</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        foreach ($lines as $line) {
          $fields = explode(',', $line);
          $name = $fields[0];
          $email = $fields[1];
          $parking_space = $fields[2];
          $start_time = $fields[3];
          $end_time = $fields[4];

          echo '<tr>';
          echo '<td>' . htmlspecialchars("Parking Space $parking_space") . '</td>';
          echo '<td>' . htmlspecialchars($name) . '</td>';
          echo '<td>' . htmlspecialchars($start_time) . '</td>';
          echo '<td>' . htmlspecialchars($end_time) . '</td>';
          echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        ?>
      </table>
    </main>
    <footer>
      <p>&copy; 2021 Parking Space Management</p>
    </footer>
  </body>
</html>