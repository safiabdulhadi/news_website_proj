<?php require_once("commonsF/header.php") ?>
<div class="container my-5">
    <div class="row">
<?php
$post_id = $GET['post_id'];
$sql = "SELECT * FROM posts WHERE id = {$post_id}";
?>
     <!--News -->
         <div class="col-md-9">
                <div class="card mb-3 ">
                        <div class="row g-0 news-page">
                                <div class="col-md-12">
                                        <div class="news-thumb">
                                        <a href=""><img src="assets/images/1.jpg" class="img-fluid rounded-start" alt="photo"></a>
                                        </div>
                                </div>
                        </div>
                </div>


                <div class="card p-5 mb-3">
                            <div class="row g-0 news-page">
                                    <div class="col-md-12">
                                            <div class="">
                                                <h1>This is place to add the main header</h1>
                                                <div class="header-news-details">
                                                    <small><i class="fa-solid fa-user-pen me-2"></i>Ahmad Khan</small>
                                                    <small class="mx-5"><i class="fa-regular fa-calendar-days me-2"></i>200-10-05</small>
                                                    <small><i class="fa-solid fa-eye me-2"></i>5K</small>
                                                </div>
                                            </div>
                                    </div>
                             </div>
                     </div>




                     <div class="card p-5 mb-3">
                            <div class="row g-0 news-page">
                                    <div class="col-md-12">
                                            <div class="">
                                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quos et vel velit eaque perferendis ipsam deserunt at natus, vitae dolore assumenda voluptatem! Incidunt harum tenetur voluptate iste quasi, nostrum saepe beatae placeat, ullam sequi, sit molestias quidem tempore aspernatur provident natus inventore. Quos, minus officia. Quaerat commodi perspiciatis dolorem praesentium temporibus. Laboriosam mollitia magni deserunt! Et esse deserunt quas nisi similique amet nostrum porro vel, sed fugiat suscipit eum fugit illo perspiciatis. Ipsum, assumenda natus. A amet laborum neque nesciunt? Vero adipisci nihil sunt, ratione saepe sequi voluptas, qui error dolor, reprehenderit nesciunt aut aperiam. Blanditiis sapiente nisi sed accusamus neque obcaecati magnam? Qui vitae, velit asperiores aperiam fugiat error saepe quibusdam voluptate animi alias quaerat debitis doloremque id enim tempora pariatur at ad autem, dicta vel dignissimos cupiditate aliquid? Quasi consequuntur ducimus aliquam aperiam minima placeat magnam maxime sed non perferendis impedit sit obcaecati fugiat saepe ipsum quisquam dolorum atque corrupti iure, doloribus autem officia voluptas, facilis distinctio? Est, in deserunt! Iste aliquid illum at dicta! Assumenda excepturi itaque consectetur sint, quod numquam reiciendis sunt eius est et laborum sequi magnam enim molestias sit ipsa quaerat, deleniti laboriosam quo placeat eum. Quidem, voluptate. Expedita rerum quod cupiditate inventore dolore. Ullam maxime assumenda non? Dignissimos quasi aliquid fugit. Reprehenderit corporis saepe dignissimos, quos labore iure praesentium, provident, sint at magni ex pariatur neque quod explicabo earum velit omnis veritatis nulla adipisci atque? Sequi iusto dignissimos quaerat modi accusantium excepturi consequuntur quasi unde velit nostrum adipisci quae, commodi officiis error illo, laudantium soluta ab earum dolores ut doloremque. Sequi, natus temporibus. Incidunt labore voluptatibus minima enim modi beatae quam totam cumque. Vel impedit consequuntur voluptatum. Animi, minima dolor. Veritatis architecto ea accusamus consequatur assumenda? Similique aliquam at porro voluptas, enim nulla incidunt perspiciatis mollitia magni nesciunt molestias, praesentium doloribus voluptatibus, excepturi id. Odio cumque excepturi ducimus nihil qui nobis consequatur voluptas atque veniam numquam neque ipsa, doloribus velit, aut voluptate aliquam quisquam rem nesciunt perferendis. Amet harum natus reprehenderit in, nesciunt aut dolore sint consectetur asperiores cumque, unde magni molestiae veniam odit ratione illo numquam. Sequi facere soluta iusto aliquid inventore voluptas iste quas, eveniet nesciunt quam eaque aliquam voluptates possimus vitae ullam consequatur vero mollitia omnis architecto. Vero, expedita, assumenda iure quod magnam maxime excepturi non modi hic optio id, voluptatem accusantium voluptatibus. Quod architecto, voluptatibus illum, quidem quibusdam quasi iste exercitationem est fugit obcaecati illo aliquam commodi dolorum ipsa aliquid? Reprehenderit tenetur nemo vitae atque quibusdam, animi amet accusantium, modi recusandae fuga odio quod. Maxime delectus itaque earum vitae deserunt, rem ut dolorem! Aperiam quos fugit nobis placeat laudantium. Sed velit cumque labore natus in, voluptatibus voluptas dolorum sint odio excepturi quae esse quod temporibus dicta placeat. Expedita adipisci voluptates, nesciunt laboriosam aliquam ipsam commodi ad. Facilis, at blanditiis? Delectus, natus praesentium. Perferendis adipisci libero aspernatur ad ipsum obcaecati enim porro similique possimus omnis, dolorum excepturi nesciunt, quas doloremque ab consectetur nam soluta, fugit temporibus eum? Rem aliquam perspiciatis tenetur tempora, consequuntur vitae vero ipsam excepturi, dignissimos aperiam nesciunt.</p>
                                            </div>
                                    </div>
                             </div>
                     </div>



         </div>

        <!-- SideBar -->
        <div class="col-md-3">
            <h4>Latest News</h4>
            <hr>
                <div class="card mb-3 ">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="sidebar-img">
                                        <a href=""><img src="assets/images/1.jpg" class="img-fluid rounded-start" alt="photo"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 position-relative">
                                    <div class="card-body">
                                        <a href="" class="news-title">news all about ne situation in Afghanistan...</a>
                                        <div class="sidBar-time mt-2">
                                            <span>  <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
                                        </div>
                                   </div>
                               </div>
                         </div>
                  </div>

                  <div class="card mb-3 ">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <div class="sidebar-img">
                                        <a href=""><img src="assets/images/1.jpg" class="img-fluid rounded-start" alt="photo"></a>
                                    </div>
                                </div>
                                <div class="col-md-8 position-relative">
                                    <div class="card-body">
                                        <a href="" class="news-title">news all about ne situation in Afghanistan...</a>
                                        <div class="sidBar-time mt-2">
                                            <span>  <i class="fa-solid fa-clock me-2"></i>10 minuts ago</span>
                                        </div>
                                   </div>
                               </div>
                         </div>
                  </div>

                  <!--  sidebar-cantegory    -->
                  <div class="row sidebar-cantegory my-4">
                    <div class="col">
                        <h3>Categories</h3>
                        <hr>
                    <ul>
                        <li><a href="">General</a></li>
                        <li><a href="">Political</a></li>
                        <li><a href="">Sports</a></li>
                        <li><a href="">Economies</a></li>
                        <li><a href="">Technology</a></li>
                        <li><a href="">Entertinment</a></li>
                    </ul>
                    </div>
                  </div>

         </div>
    </div>
</div>
<?php require_once("commonsF/footer.php") ?>