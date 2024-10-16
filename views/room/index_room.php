<!DOCTYPE html>
 <html>

 <head>
     <meta charset="UTF-8" />
     <link rel="stylesheet" href="views/room/styles/roompage--style.css">
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
                        <th>Type</th>
                        <th>Price</th>
                        <th>Detail</th>
                        <th>Status</th>
                        <th>Update</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($roomList as $room): ?>
                    <tr>
                        <td><?php echo $room->id; ?></td>
                        <td><?php echo $room->type; ?></td>
                        <td><?php echo $room->price; ?></td>
                        <td><?php echo $room->detail; ?></td>
                        <td style="color: <?php echo $room->roomStatus == 0 ? '#28a745' : 'red'; ?>;">
                            <?php echo $room->roomStatus == 0 ? 'Available' : 'Occupied'; ?>
                        </td>
                        <td><a href="?controller=rooms&action=update&id=<?php echo $room->id; ?>"class = "btn green">Update</a></td>
                        <td><a href="?controller=rooms&action=delete&id=<?php echo $room->id; ?>"class = "btn red">Delete</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
                </div>
            </div>

            
        </div>
        
</body>

 </html>







