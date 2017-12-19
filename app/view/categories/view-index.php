<div class="container">
    <h2>All categories</h2></td>
    <a class="waves-effect right btn-floating btn-large" href="<?php echo ABSURL; ?>/categories/add">
        <i class="material-icons">  add </i>
    </a>
    <table class="bordered highlight centered tab-margin">
        <thead>
        <tr>
            <th>NAME</th>
            <th>MODIFY</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";
        if(!empty($categories)) {

            foreach ($categories as $category) {

                $actionEdit = '

            <a href="'.ABSURL.'/categories/edit?id='.$category->getId().'" class="waves-effect btn">
                <i class="large material-icons">edit</i>
            </a>
          
            
            ';
                $actionDelete = '

           
            <a href="' . ABSURL . '/categories/delete?id=' . $category->getId() . '" class="waves-effect btn">
                <i class="large material-icons">delete</i>
            </a> 
            
            ';

                $html .= '<tr>
              
               <td>' . $category->getName() . '</td>
               <td>' . $actionEdit . '</td>
               <td>' . $actionDelete . '</td>
              
            
            </tr>';
            }

        }
        echo $html;
        ?>
        </tbody>
    </table>
</div>