<div class="post-container">
                        <div class="post-row">
                            <div class="user-profile">
                                <img src="images/profile.jpg">
                                <div>
                                    <p>
                                        <?php 
                                          echo $row['userid'];
                                        ?>
                                    </p>
                                    <span>
                                        <?php 
                                          echo $row['date'];
                                        ?>

                                    </span>
                               </div>
                            </div>  
                            <a href="#"><i class="fas fa-ellipsis-v"></i></a> 
                        </div>
                        
                            
                            <p class="post-text">
                                <?php
                                  echo $row['post'];
                                ?></p>
                        <?php if($row['has_image']==1){?>
                            <img src="images/feed-image-1.png" class="post-img">
                        <?php } ?>
                            <div class="post-row">
                                <div class="activity-icons">
                                     <div><img src="images/like-blue.png">120</div>
                                     <div><img src="images/comments.png">45</div>
                                     
                                </div>
                                
                                <div class="post-profile-icon">
                                  <img src="images/profile.jpg"><i class="fas fa-sort-down"></i>
                                </div>
                            </div>
                       </div>
                   