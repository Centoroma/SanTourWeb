<div class="container">
    <h2>All tracks</h2>
    <table class="bordered highlight centered">
        <thead>
        <tr>
            <th>NAME</th>
            <th>DURATION</th>
            <th>KILOMETERS</th>
            <th>INFORMATIONS</th>
            <th>MODIFY</th>
            <th>DELETE</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";

        if(!empty($tracks)) {
            foreach ($tracks as $track) {
                $actionInfo = '
                <a href="' . ABSURL . '/tracks/details?id=' . $track->getId() . '" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">info_outline</i>
                </a>
             
            ';
                $actionModify = '
               
                <a href="' . ABSURL . '/tracks/edit?id=' . $track->getId() . '" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">edit</i>
                </a>
              
            ';
                $actionDelete = '
                
                <a href="' . ABSURL . '/tracks/delete?id=' . $track->getId() . '" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">delete</i>
                </a> 
            ';
                $html .= '
                <tr>
                    <td>' . $track->getName() . '</td>
                    <td>' . $track->getTimer() . '</td>
                    <td>' . $track->getLength() . '</td>
                    <td>' . $actionInfo . '</td>
                    <td>' . $actionModify . '</td>
                    <td>' . $actionDelete . '</td>
                    
                </tr>
            ';
            }
        }
        echo $html;
        ?>
        </tbody>
    </table>
</div>