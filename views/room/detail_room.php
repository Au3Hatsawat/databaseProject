<!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8" />
     <link rel="stylesheet" href="views/room/styles/home--style.css">
     <link rel="stylesheet" href="views/room/styles/table--style.css">
    
 </head>

 <body>
        <div class="main--content">
            <div class="header--wrapper">
                <div class="header--title">
                   <span>Room</span>
                    <h2>Edit</h2>

                </div>
                <div class="header--action">
                    <a href="?controller=room&action=index&buttonId=room"><span>Rooms</span></a>
                </div>
                <div class="header--action">
                    <a href="?controller=room&action=type&buttonId=room"><span>Room Types</span></a>
                </div>
                <div class="header--action">
                    <a href="?controller=room&action=detail&buttonId=room"><span>Room Details</span></a>
                </div>
                
            
                <div class="search--box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input tpye="text" placeholder="Search" />
                </div>
                
            
            </div> 
            <div class="button--wrapper">
                <div class="button--action">
                    <a href="?controller=room&action=index&buttonId=room"><span>ADD</span></a>
                </div>
            </div> 
            <div class="table--wrapper">
                <div class="table--container">
                <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Detail</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($detailList as $detail): ?>
                    <tr>
                        <td><?php echo $detail->id; ?></td>
                        <td><?php echo $detail->name; ?></td>
                        <td><a href="?controller=rooms&action=update&id=<?php echo $detail->id; ?>"class = "btn green">Update</a></td>
                        <td><a href="?controller=rooms&action=delete&id=<?php echo $detail->id; ?>"class = "btn red">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                </div>
            </div>
        </div>
</body>

 </html>







