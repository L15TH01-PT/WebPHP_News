<div class="header-nav-container">
    <nav>
        <ul>
            <?php
            require_once getLibsPath('connect');
            require_once getModelPath('model_danhmuc');
            $data=danh_sach_dm_ex($conn);
            for($i=0;$i<count($data);$i++)
            {
                if($data[$i]['parent_id'] !=0)
                    break;
                for($j=$i+1;$j<count($data);$j++)
                {
                    if($data[$i]['id']==$data[$j]['parent_id'])
                        break;
                }
            ?>
            <li<?php
                if(isset($_GET['cat']) && $_GET['cat'] == $data[$i]['id'])
                {
                    echo ' class="active',$j<count($data)?' dropdown':'','"';
                }
                else
                    echo $j<count($data)?' class="dropdown"':'';
               ?>>
                <a href="<?php echo getMyLink(array('cat'=>$data[$i]['id']));?>"><?php echo $data[$i]['name'];?></a>
            <?php
                if(j<count($data))
                {
            ?>
                <div class="dropdown-content">
                    <?php
                        for($j;$j<count($data);$j++)
                        {
                            if($data[$i]['id']!=$data[$j]['parent_id'])
                                break;
                            echo '<a href="',getMyLink(array('cat'=>$data[$j]['id'])),'">',$data[$j]['name'],'</a>';
                        }
                    ?>
                </div>
            </li>
                <?php
                }
            }
            ?>
        </ul>
    </nav>
</div>