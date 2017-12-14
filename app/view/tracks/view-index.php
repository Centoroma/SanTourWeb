<div class="container">
    <h1>All tracks</h1></td>
    <table class="bordered">
        <thead>
        <tr>
            <th>Track's name</th>
            <th>Duration</th>
            <th>Kilometers</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $html = "";
        foreach ($tracks as $track) {
            $actions = '
                <a href="'.ABSURL.'/tracks/details?id='.$track->getId().'" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">info_outline</i>
                </a>
                <a href="'.ABSURL.'/tracks/edit?id='.$track->getId().'" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">edit</i>
                </a>
                <a href="'.ABSURL.'/tracks/delete?id='.$track->getId().'" class="waves-effect waves-light btn resa-btn">
                    <i class="large material-icons">delete</i>
                </a> 
            ';
            $html .= '
                <tr>
                    <td>'.$track->getName().'</td>
                    <td>'.$track->getTimer().'</td>
                    <td>'.$track->getLength().'</td>
                    <td>'.$actions.'</td>
                </tr>
            ';
        }

        echo $html;
        ?>
        </tbody>
    </table>
</div>