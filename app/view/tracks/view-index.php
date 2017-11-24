<div class="container">
    <h1>All tracks</h1></td>
    <table class="bordered">
        <thead>
        <tr>
            <th>Track's name</th>
            <th>Duration</th>
            <th>Kilometers</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";
//        foreach ($users as $user) {
//
//
//            if ($user['idRole'] != 3) {
//
               $actions = '

            <a href="/santourweb/tracks/edit" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">edit</i>
            </a>
                  <a href="/santourweb/categories/delete" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">delete</i>
            </a> 
            
            ' ;

                $html .= '<tr>
              
              <td>Track 1 </td>
                <td>22:43</td>
                <td>12km</td>
                <td>' . $actions . '</td>
              
            
            </tr>';
//            }
//        }

        echo $html;
        ?>
        </tbody>
    </table>
</div>