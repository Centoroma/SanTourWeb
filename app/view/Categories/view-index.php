<div class="container">
    <h1>All categories</h1></td>
    <a class="btn waves-effect waves-light resa-btn" href="/santourweb/categories/add">Add a new categorie</a>
    <table class="bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Degree</th>

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

            <a href="/santourweb/categories/edit" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">edit</i>
            </a>
            <a href="/santourweb/categories/delete" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">delete</i>
            </a> 
            
            ' ;

        $html .= '<tr>
              
                <td>Rocks </td>
                <td>graduation</td>
                <td>12</td>
                <td>' . $actions . '</td>
              
            
            </tr>';
        //            }
        //        }

        echo $html;
        ?>
        </tbody>
    </table>
</div>