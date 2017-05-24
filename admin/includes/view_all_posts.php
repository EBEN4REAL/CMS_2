
                        <table class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>Category</th>
                                    <th>Edit</th>
                                    <th>Trash</th>
                                   
                                 </tr>
                            </thead>
                            <tbody>
                            <?php

                            $fetch_posts = "SELECT * FROM posts";
                            $sql_query = mysqli_query($connection , $fetch_posts);
                            while ($rows  = mysqli_fetch_assoc($sql_query)) {
                                # code...
                                $post_id = $rows['post_id'];
                                $post_title = $rows['post_title'];
                                $post_author = $rows['post_author'];
                                $post_image = $rows['post_image'];
                                
                                $post_status = $rows['post_status'];
                                $post_date = $rows['post_date'];
                                $post_tags = $rows['post_tags'];
                                $post_category_id = $rows['post_category_id'];
                                $post_comment_count = $rows['post_comment_count'];

                                
                                echo "<tr>";
                                echo "<td>$post_id</td>";
                                echo "<td>$post_author</td>";
                                echo "<td>$post_title</td>";
                                echo "<td>$post_status</td>";
                                echo ' <td><img src="../images/'.$post_image.'" width="30px" height="30px"></td>';
                                echo "<td>$post_tags</td>";
                                echo "<td>$post_comment_count</td>";
                                echo "<td>$post_date</td>";

                                $query = "SELECT * FROM posts WHERE post_id = '$post_id'";
                                $select_categories_id = mysqli_query($connection ,$query);
                                while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                    # code...
                                    $post_category_id =  $row['post_category_id'];
                                    
                                      echo "<td> $post_category_id</td>";
                                }

                                echo ' <td><a href="posts.php?source=edit_post&post_id='.$post_id.'" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>';
                                echo ' <td><a href="posts.php?del_id='.$rows['post_id'].'" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';

                            } 

                             ?>
                               
                            </tbody>
                        </table>


                        <?php

                        if (isset($_GET['del_id'])) {
                            # code...
                            $delete = $_GET['del_id'];
                            $delete_post = "DELETE FROM posts WHERE post_id = '$delete'";
                            $sql_query = mysqli_query($connection , $delete_post);
                            header("Location: posts.php");

                        }
                       
                        ?>