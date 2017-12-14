<div class="container">
    <h1>All categories</h1></td>
    <a class="btn waves-effect waves-light resa-btn" href="<?php echo ABSURL; ?>/categories/add">Add a new categorie</a>
    <table class="bordered">
        <thead>
        <tr>
            <th>Name</th>

        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";
        if(!empty($categories)) {

            foreach ($categories as $category) {

                $actions = '

            <a href="'.ABSURL.'/categories/edit?id='.$category->getId().'" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">edit</i>
            </a>
            <a href="' . ABSURL . '/categories/delete?id=' . $category->getId() . '" class="waves-effect waves-light btn resa-btn">
                <i class="large material-icons">delete</i>
            </a> 
            
            ';

                $html .= '<tr>
              
               <td>' . $category->getName() . '</td>
               <td>' . $actions . '</td>
              
            
            </tr>';
            }

        }
        echo $html;
        ?>
        </tbody>
    </table>
</div>