<div class="header-nav-container">
    <nav>
        <ul>
            <?php
            require_once getLibsPath('connect');
            require_once getModelPath('model_danhmuc');
            foreach (danh_sach_dm($conn) as $data)
            {
            ?>
            <li<?php
                if(isset($_GET['cat']))
                    if($_GET['cat'] == $data['id'])
                        echo ' class="active"';
               ?>><a href="<?php echo getMyLink(array('cat'=>$data['id']));?>"><?php echo $data['name'];?></a></li>
            <?php
            }
            ?>
        </ul>
    </nav>
</div>