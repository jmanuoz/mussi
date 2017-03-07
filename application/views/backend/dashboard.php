<?php
  foreach ($followers as $f) {

    switch($f->name){
      case 'Twitter':
        $twFollowers = $f->followers;
        break;
      case 'Facebook':
        $fbFollowers = $f->followers;
        break;
      case 'Instagram':
        $inFollowers = $f->followers;
        break;
      case 'Youtube':
        $yoFollowers = $f->followers;
        break;
    }
  }

?>
      <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
          <!-- BEGIN PAGE HEADER-->

          <!-- BEGIN PAGE BAR -->
          <div class="page-bar">
            <ul class="page-breadcrumb">
              <li>
                <a href="">Inicio</a>
                <i class="fa fa-circle"></i>
              </li>
              <li>
                <span>Panel principal</span>
              </li>
            </ul>
            <div class="page-toolbar">
              <div id="dashboard-report-range" class="pull-right tooltips btn btn-sm" data-container="body" data-placement="bottom" data-original-title="Change dashboard date range">
                <i class="icon-calendar"></i>&nbsp;
                <span class="thin uppercase hidden-xs"></span>&nbsp;
                <i class="fa fa-angle-down"></i>
              </div>
            </div>
          </div>
          <!-- END PAGE BAR -->
          <!-- BEGIN PAGE TITLE-->
          <h1 class="page-title"> Panel de Administración
            <small>estadísticas y opciones de configuración</small>
          </h1>
          <!-- END PAGE TITLE-->
          <!-- END PAGE HEADER-->
          <!-- BEGIN DASHBOARD STATS 1-->
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                <div class="visual">
                  <i class="fa fa-twitter"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span data-counter="counterup" data-value="<?= $twFollowers; ?>">0</span>
                  </div>
                  <div class="desc"> nuevos Twitts </div>
                </div>
              </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <a class="dashboard-stat dashboard-stat-v2 red" href="#">
                <div class="visual">
                  <i class="fa fa-youtube"></i>
                </div>
                <div class="details">
                  <div class="number">
                    <span data-counter="counterup" data-value="<?= $yoFollowers; ?>">0</span></div>
                    <div class="desc"> suscriptores de Youtube </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" style="background-color: #3b5998!important;" href="#">
                  <div class="visual">
                    <i class="fa fa-facebook"></i>
                  </div>
                  <div class="details">
                    <div class="number">
                      <span data-counter="counterup" data-value="<?= $fbFollowers; ?>">0</span>
                    </div>
                    <div class="desc"> nuevos seguidores </div>
                  </div>
                </a>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" style="background-color:#125688!important;" href="#">
                  <div class="visual">
                    <i class="fa fa-instagram"></i>
                  </div>
                  <div class="details">
                    <div class="number">
                      <span data-counter="counterup" data-value="<?= $inFollowers; ?>"></span></div>
                      <div class="desc"> nuevos seguidores </div>
                    </div>
                  </a>
                </div>
              </div>
              <div class="clearfix"></div>
              <!-- END DASHBOARD STATS 1-->

              <div class="row">
                <div class="col-lg-12">
                  <!-- BEGIN SAMPLE TABLE PORTLET-->
                  <div class="portlet">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="fa fa-bell-o"></i>Posteos publicados </div>
                        <div class="tools">
                          <a href="javascript:;" class="reload"> </a>
                          <a href="javascript:;" class="remove"> </a>
                        </div>
                      </div>
                      <div class="portlet-body">
                        <div class="table-scrollable">
                          <table class="table table-striped table-bordered table-advance table-hover">
                            <thead>
                              <tr>
                                <th style="background-color: transparent; border: none!important;"></th>
                                <th>
                                  <i class="fa fa-file-text-o"></i> Contenido </th>
                                  <th class="hidden-xs">
                                    <i class="fa fa-tag"></i> Categorías </th>
                                    <th>
                                      <i class="fa fa-calendar-o"></i> Fecha / Hora </th>
                                      <th> </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach($posts as $post): ?>
                                    <tr>
                                      <td class="highlight" style="text-align: center; padding-left: 0; padding-right: 0;">
                                        <?php

                                          switch ($post->social_net) {
                                            case '1':
                                              echo "<i class='fa fa-twitter' aria-hidden='true'></i>";
                                              break;
                                            case '2':
                                              echo "<i class='fa fa-facebook' aria-hidden='true'></i>";
                                              break;

                                            default:
                                              break;
                                          }

                                        ?>
                                      </td>
                                      <td class="highlight">
                                        <?= $post->text; ?>
                                      </td>
                                      <td class="hidden-xs">
                                        <?php $categories = $post->categories; ?>
                                        <?php if (sizeof($categories)>0){ ?>
                                          <select name="category-<?php echo $post->post_id?>[]" id="category-<?php echo $post->post_id?>" class="js-example-basic-multiple" multiple="multiple">
                                           <?php foreach($categories as $category):?>
                                               <option value="<?php echo $category->category_id ?>"
                                                   <?php echo in_array(array('category_id'=>$category->category_id), $post->categories)?'SELECTED':''?>>
                                                   <?php echo $category->category_name ?></option>
                                           <?php endforeach; ?>

                                          </select>
                                          <?php } ?>
                                      </td>
                                      <td><?= $post->date; ?></td>
                                      <td>
                                        <a href="javascript:;" class="btn btn-outline btn-circle btn-sm purple">
                                          <i class="fa fa-edit"></i> Edit </a>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                      </tbody>
                                        </table>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- END SAMPLE TABLE PORTLET-->
                                </div>
                              </div>


                      <div class="row">
                        <div class="col-lg-6 col-xs-12 col-sm-12">
                          <div class="portlet light bordered">
                            <div class="portlet-title tabbable-line">
                              <div class="caption">
                                <i class="icon-bubbles font-dark hide"></i>
                                <span class="caption-subject font-dark bold uppercase">Comments</span>
                              </div>
                              <ul class="nav nav-tabs">
                                <li class="active">
                                  <a href="#portlet_comments_1" data-toggle="tab"> Pending </a>
                                </li>
                                <li>
                                  <a href="#portlet_comments_2" data-toggle="tab"> Approved </a>
                                </li>
                              </ul>
                            </div>
                            <div class="portlet-body">
                              <div class="tab-content">
                                <div class="tab-pane active" id="portlet_comments_1">
                                  <!-- BEGIN: Comments -->
                                  <div class="mt-comments">
                                    <div class="mt-comment">
                                      <div class="mt-comment-img">
                                        <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                        <div class="mt-comment-body">
                                          <div class="mt-comment-info">
                                            <span class="mt-comment-author">Michael Baker</span>
                                            <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                          </div>
                                          <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. </div>
                                          <div class="mt-comment-details">
                                            <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                            <ul class="mt-comment-actions">
                                              <li>
                                                <a href="#">Quick Edit</a>
                                              </li>
                                              <li>
                                                <a href="#">View</a>
                                              </li>
                                              <li>
                                                <a href="#">Delete</a>
                                              </li>
                                            </ul>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="mt-comment">
                                        <div class="mt-comment-img">
                                          <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                          <div class="mt-comment-body">
                                            <div class="mt-comment-info">
                                              <span class="mt-comment-author">Larisa Maskalyova</span>
                                              <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                            </div>
                                            <div class="mt-comment-text"> It is a long established fact that a reader will be distracted. </div>
                                            <div class="mt-comment-details">
                                              <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                              <ul class="mt-comment-actions">
                                                <li>
                                                  <a href="#">Quick Edit</a>
                                                </li>
                                                <li>
                                                  <a href="#">View</a>
                                                </li>
                                                <li>
                                                  <a href="#">Delete</a>
                                                </li>
                                              </ul>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="mt-comment">
                                          <div class="mt-comment-img">
                                            <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                            <div class="mt-comment-body">
                                              <div class="mt-comment-info">
                                                <span class="mt-comment-author">Natasha Kim</span>
                                                <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                              </div>
                                              <div class="mt-comment-text"> The generated Lorem or non-characteristic Ipsum is therefore or non-characteristic. </div>
                                              <div class="mt-comment-details">
                                                <span class="mt-comment-status mt-comment-status-pending">Pending</span>
                                                <ul class="mt-comment-actions">
                                                  <li>
                                                    <a href="#">Quick Edit</a>
                                                  </li>
                                                  <li>
                                                    <a href="#">View</a>
                                                  </li>
                                                  <li>
                                                    <a href="#">Delete</a>
                                                  </li>
                                                </ul>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="mt-comment">
                                            <div class="mt-comment-img">
                                              <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                              <div class="mt-comment-body">
                                                <div class="mt-comment-info">
                                                  <span class="mt-comment-author">Sebastian Davidson</span>
                                                  <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                </div>
                                                <div class="mt-comment-text"> The standard chunk of Lorem or non-characteristic Ipsum used since the 1500s or non-characteristic. </div>
                                                <div class="mt-comment-details">
                                                  <span class="mt-comment-status mt-comment-status-rejected">Rejected</span>
                                                  <ul class="mt-comment-actions">
                                                    <li>
                                                      <a href="#">Quick Edit</a>
                                                    </li>
                                                    <li>
                                                      <a href="#">View</a>
                                                    </li>
                                                    <li>
                                                      <a href="#">Delete</a>
                                                    </li>
                                                  </ul>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <!-- END: Comments -->
                                        </div>
                                        <div class="tab-pane" id="portlet_comments_2">
                                          <!-- BEGIN: Comments -->
                                          <div class="mt-comments">
                                            <div class="mt-comment">
                                              <div class="mt-comment-img">
                                                <img src="../assets/pages/media/users/avatar4.jpg" /> </div>
                                                <div class="mt-comment-body">
                                                  <div class="mt-comment-info">
                                                    <span class="mt-comment-author">Michael Baker</span>
                                                    <span class="mt-comment-date">26 Feb, 10:30AM</span>
                                                  </div>
                                                  <div class="mt-comment-text"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy. </div>
                                                  <div class="mt-comment-details">
                                                    <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                    <ul class="mt-comment-actions">
                                                      <li>
                                                        <a href="#">Quick Edit</a>
                                                      </li>
                                                      <li>
                                                        <a href="#">View</a>
                                                      </li>
                                                      <li>
                                                        <a href="#">Delete</a>
                                                      </li>
                                                    </ul>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="mt-comment">
                                                <div class="mt-comment-img">
                                                  <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                  <div class="mt-comment-body">
                                                    <div class="mt-comment-info">
                                                      <span class="mt-comment-author">Larisa Maskalyova</span>
                                                      <span class="mt-comment-date">12 Feb, 08:30AM</span>
                                                    </div>
                                                    <div class="mt-comment-text"> It is a long established fact that a reader will be distracted by. </div>
                                                    <div class="mt-comment-details">
                                                      <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                      <ul class="mt-comment-actions">
                                                        <li>
                                                          <a href="#">Quick Edit</a>
                                                        </li>
                                                        <li>
                                                          <a href="#">View</a>
                                                        </li>
                                                        <li>
                                                          <a href="#">Delete</a>
                                                        </li>
                                                      </ul>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="mt-comment">
                                                  <div class="mt-comment-img">
                                                    <img src="../assets/pages/media/users/avatar6.jpg" /> </div>
                                                    <div class="mt-comment-body">
                                                      <div class="mt-comment-info">
                                                        <span class="mt-comment-author">Natasha Kim</span>
                                                        <span class="mt-comment-date">19 Dec,09:50 AM</span>
                                                      </div>
                                                      <div class="mt-comment-text"> The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc. </div>
                                                      <div class="mt-comment-details">
                                                        <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                        <ul class="mt-comment-actions">
                                                          <li>
                                                            <a href="#">Quick Edit</a>
                                                          </li>
                                                          <li>
                                                            <a href="#">View</a>
                                                          </li>
                                                          <li>
                                                            <a href="#">Delete</a>
                                                          </li>
                                                        </ul>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <div class="mt-comment">
                                                    <div class="mt-comment-img">
                                                      <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                                      <div class="mt-comment-body">
                                                        <div class="mt-comment-info">
                                                          <span class="mt-comment-author">Sebastian Davidson</span>
                                                          <span class="mt-comment-date">10 Dec, 09:20 AM</span>
                                                        </div>
                                                        <div class="mt-comment-text"> The standard chunk of Lorem Ipsum used since the 1500s </div>
                                                        <div class="mt-comment-details">
                                                          <span class="mt-comment-status mt-comment-status-approved">Approved</span>
                                                          <ul class="mt-comment-actions">
                                                            <li>
                                                              <a href="#">Quick Edit</a>
                                                            </li>
                                                            <li>
                                                              <a href="#">View</a>
                                                            </li>
                                                            <li>
                                                              <a href="#">Delete</a>
                                                            </li>
                                                          </ul>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  <!-- END: Comments -->
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-6 col-xs-12 col-sm-12">
                                          <div class="portlet light bordered">
                                            <div class="portlet-title tabbable-line">
                                              <div class="caption">
                                                <i class=" icon-social-twitter font-dark hide"></i>
                                                <span class="caption-subject font-dark bold uppercase">Quick Actions</span>
                                              </div>
                                              <ul class="nav nav-tabs">
                                                <li class="active">
                                                  <a href="#tab_actions_pending" data-toggle="tab"> Pending </a>
                                                </li>
                                                <li>
                                                  <a href="#tab_actions_completed" data-toggle="tab"> Completed </a>
                                                </li>
                                              </ul>
                                            </div>
                                            <div class="portlet-body">
                                              <div class="tab-content">
                                                <div class="tab-pane active" id="tab_actions_pending">
                                                  <!-- BEGIN: Actions -->
                                                  <div class="mt-actions">
                                                    <div class="mt-action">
                                                      <div class="mt-action-img">
                                                        <img src="../assets/pages/media/users/avatar10.jpg" /> </div>
                                                        <div class="mt-action-body">
                                                          <div class="mt-action-row">
                                                            <div class="mt-action-info ">
                                                              <div class="mt-action-icon ">
                                                                <i class="icon-magnet"></i>
                                                              </div>
                                                              <div class="mt-action-details ">
                                                                <span class="mt-action-author">Natasha Kim</span>
                                                                <p class="mt-action-desc">Dummy text of the printing</p>
                                                              </div>
                                                            </div>
                                                            <div class="mt-action-datetime ">
                                                              <span class="mt-action-date">3 jun</span>
                                                              <span class="mt-action-dot bg-green"></span>
                                                              <span class="mt=action-time">9:30-13:00</span>
                                                            </div>
                                                            <div class="mt-action-buttons ">
                                                              <div class="btn-group btn-group-circle">
                                                                <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                      </div>
                                                      <div class="mt-action">
                                                        <div class="mt-action-img">
                                                          <img src="../assets/pages/media/users/avatar3.jpg" /> </div>
                                                          <div class="mt-action-body">
                                                            <div class="mt-action-row">
                                                              <div class="mt-action-info ">
                                                                <div class="mt-action-icon ">
                                                                  <i class=" icon-bubbles"></i>
                                                                </div>
                                                                <div class="mt-action-details ">
                                                                  <span class="mt-action-author">Gavin Bond</span>
                                                                  <p class="mt-action-desc">pending for approval</p>
                                                                </div>
                                                              </div>
                                                              <div class="mt-action-datetime ">
                                                                <span class="mt-action-date">3 jun</span>
                                                                <span class="mt-action-dot bg-red"></span>
                                                                <span class="mt=action-time">9:30-13:00</span>
                                                              </div>
                                                              <div class="mt-action-buttons ">
                                                                <div class="btn-group btn-group-circle">
                                                                  <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                  <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>
                                                        <div class="mt-action">
                                                          <div class="mt-action-img">
                                                            <img src="../assets/pages/media/users/avatar2.jpg" /> </div>
                                                            <div class="mt-action-body">
                                                              <div class="mt-action-row">
                                                                <div class="mt-action-info ">
                                                                  <div class="mt-action-icon ">
                                                                    <i class="icon-call-in"></i>
                                                                  </div>
                                                                  <div class="mt-action-details ">
                                                                    <span class="mt-action-author">Diana Berri</span>
                                                                    <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                                  </div>
                                                                </div>
                                                                <div class="mt-action-datetime ">
                                                                  <span class="mt-action-date">3 jun</span>
                                                                  <span class="mt-action-dot bg-green"></span>
                                                                  <span class="mt=action-time">9:30-13:00</span>
                                                                </div>
                                                                <div class="mt-action-buttons ">
                                                                  <div class="btn-group btn-group-circle">
                                                                    <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                    <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="mt-action">
                                                            <div class="mt-action-img">
                                                              <img src="../assets/pages/media/users/avatar7.jpg" /> </div>
                                                              <div class="mt-action-body">
                                                                <div class="mt-action-row">
                                                                  <div class="mt-action-info ">
                                                                    <div class="mt-action-icon ">
                                                                      <i class=" icon-bell"></i>
                                                                    </div>
                                                                    <div class="mt-action-details ">
                                                                      <span class="mt-action-author">John Clark</span>
                                                                      <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                                    </div>
                                                                  </div>
                                                                  <div class="mt-action-datetime ">
                                                                    <span class="mt-action-date">3 jun</span>
                                                                    <span class="mt-action-dot bg-red"></span>
                                                                    <span class="mt=action-time">9:30-13:00</span>
                                                                  </div>
                                                                  <div class="mt-action-buttons ">
                                                                    <div class="btn-group btn-group-circle">
                                                                      <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                      <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="mt-action">
                                                              <div class="mt-action-img">
                                                                <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                                <div class="mt-action-body">
                                                                  <div class="mt-action-row">
                                                                    <div class="mt-action-info ">
                                                                      <div class="mt-action-icon ">
                                                                        <i class="icon-magnet"></i>
                                                                      </div>
                                                                      <div class="mt-action-details ">
                                                                        <span class="mt-action-author">Donna Clarkson </span>
                                                                        <p class="mt-action-desc">Simply dummy text of the printing</p>
                                                                      </div>
                                                                    </div>
                                                                    <div class="mt-action-datetime ">
                                                                      <span class="mt-action-date">3 jun</span>
                                                                      <span class="mt-action-dot bg-green"></span>
                                                                      <span class="mt=action-time">9:30-13:00</span>
                                                                    </div>
                                                                    <div class="mt-action-buttons ">
                                                                      <div class="btn-group btn-group-circle">
                                                                        <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                        <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="mt-action">
                                                                <div class="mt-action-img">
                                                                  <img src="../assets/pages/media/users/avatar9.jpg" /> </div>
                                                                  <div class="mt-action-body">
                                                                    <div class="mt-action-row">
                                                                      <div class="mt-action-info ">
                                                                        <div class="mt-action-icon ">
                                                                          <i class="icon-magnet"></i>
                                                                        </div>
                                                                        <div class="mt-action-details ">
                                                                          <span class="mt-action-author">Tom Larson</span>
                                                                          <p class="mt-action-desc">Lorem Ipsum is simply dummy text</p>
                                                                        </div>
                                                                      </div>
                                                                      <div class="mt-action-datetime ">
                                                                        <span class="mt-action-date">3 jun</span>
                                                                        <span class="mt-action-dot bg-green"></span>
                                                                        <span class="mt=action-time">9:30-13:00</span>
                                                                      </div>
                                                                      <div class="mt-action-buttons ">
                                                                        <div class="btn-group btn-group-circle">
                                                                          <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                          <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <!-- END: Actions -->
                                                            </div>
                                                            <div class="tab-pane" id="tab_actions_completed">
                                                              <!-- BEGIN:Completed-->
                                                              <div class="mt-actions">
                                                                <div class="mt-action">
                                                                  <div class="mt-action-img">
                                                                    <img src="../assets/pages/media/users/avatar1.jpg" /> </div>
                                                                    <div class="mt-action-body">
                                                                      <div class="mt-action-row">
                                                                        <div class="mt-action-info ">
                                                                          <div class="mt-action-icon ">
                                                                            <i class="icon-action-redo"></i>
                                                                          </div>
                                                                          <div class="mt-action-details ">
                                                                            <span class="mt-action-author">Frank Cameron</span>
                                                                            <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                                          </div>
                                                                        </div>
                                                                        <div class="mt-action-datetime ">
                                                                          <span class="mt-action-date">3 jun</span>
                                                                          <span class="mt-action-dot bg-red"></span>
                                                                          <span class="mt=action-time">9:30-13:00</span>
                                                                        </div>
                                                                        <div class="mt-action-buttons ">
                                                                          <div class="btn-group btn-group-circle">
                                                                            <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                            <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                  <div class="mt-action">
                                                                    <div class="mt-action-img">
                                                                      <img src="../assets/pages/media/users/avatar8.jpg" /> </div>
                                                                      <div class="mt-action-body">
                                                                        <div class="mt-action-row">
                                                                          <div class="mt-action-info ">
                                                                            <div class="mt-action-icon ">
                                                                              <i class="icon-cup"></i>
                                                                            </div>
                                                                            <div class="mt-action-details ">
                                                                              <span class="mt-action-author">Ella Davidson </span>
                                                                              <p class="mt-action-desc">Text of the printing and typesetting industry</p>
                                                                            </div>
                                                                          </div>
                                                                          <div class="mt-action-datetime ">
                                                                            <span class="mt-action-date">3 jun</span>
                                                                            <span class="mt-action-dot bg-green"></span>
                                                                            <span class="mt=action-time">9:30-13:00</span>
                                                                          </div>
                                                                          <div class="mt-action-buttons">
                                                                            <div class="btn-group btn-group-circle">
                                                                              <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                              <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                    </div>
                                                                    <div class="mt-action">
                                                                      <div class="mt-action-img">
                                                                        <img src="../assets/pages/media/users/avatar5.jpg" /> </div>
                                                                        <div class="mt-action-body">
                                                                          <div class="mt-action-row">
                                                                            <div class="mt-action-info ">
                                                                              <div class="mt-action-icon ">
                                                                                <i class=" icon-graduation"></i>
                                                                              </div>
                                                                              <div class="mt-action-details ">
                                                                                <span class="mt-action-author">Jason Dickens </span>
                                                                                <p class="mt-action-desc">Dummy text of the printing and typesetting industry</p>
                                                                              </div>
                                                                            </div>
                                                                            <div class="mt-action-datetime ">
                                                                              <span class="mt-action-date">3 jun</span>
                                                                              <span class="mt-action-dot bg-red"></span>
                                                                              <span class="mt=action-time">9:30-13:00</span>
                                                                            </div>
                                                                            <div class="mt-action-buttons ">
                                                                              <div class="btn-group btn-group-circle">
                                                                                <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                                <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                      </div>
                                                                      <div class="mt-action">
                                                                        <div class="mt-action-img">
                                                                          <img src="../assets/pages/media/users/avatar2.jpg" /> </div>
                                                                          <div class="mt-action-body">
                                                                            <div class="mt-action-row">
                                                                              <div class="mt-action-info ">
                                                                                <div class="mt-action-icon ">
                                                                                  <i class="icon-badge"></i>
                                                                                </div>
                                                                                <div class="mt-action-details ">
                                                                                  <span class="mt-action-author">Jan Kim</span>
                                                                                  <p class="mt-action-desc">Lorem Ipsum is simply dummy</p>
                                                                                </div>
                                                                              </div>
                                                                              <div class="mt-action-datetime ">
                                                                                <span class="mt-action-date">3 jun</span>
                                                                                <span class="mt-action-dot bg-green"></span>
                                                                                <span class="mt=action-time">9:30-13:00</span>
                                                                              </div>
                                                                              <div class="mt-action-buttons ">
                                                                                <div class="btn-group btn-group-circle">
                                                                                  <button type="button" class="btn btn-outline green btn-sm">Appove</button>
                                                                                  <button type="button" class="btn btn-outline red btn-sm">Reject</button>
                                                                                </div>
                                                                              </div>
                                                                            </div>
                                                                          </div>
                                                                        </div>
                                                                        <!-- END: Completed -->
                                                                      </div>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                          </div>
                                                          <div class="row">
                                                            <div class="col-lg-6 col-xs-12 col-sm-12">
                                                              <div class="portlet light portlet-fit bordered">
                                                                <div class="portlet-title">
                                                                  <div class="caption">
                                                                    <i class="icon-directions font-green hide"></i>
                                                                    <span class="caption-subject bold font-dark uppercase "> Activities</span>
                                                                    <span class="caption-helper">Horizontal Timeline</span>
                                                                  </div>
                                                                  <div class="actions">
                                                                    <div class="btn-group">
                                                                      <a class="btn blue btn-outline btn-circle btn-sm" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Actions
                                                                        <i class="fa fa-angle-down"></i>
                                                                      </a>
                                                                      <ul class="dropdown-menu pull-right">
                                                                        <li>
                                                                          <a href="javascript:;"> Action 1</a>
                                                                        </li>
                                                                        <li class="divider"> </li>
                                                                        <li>
                                                                          <a href="javascript:;">Action 2</a>
                                                                        </li>
                                                                        <li>
                                                                          <a href="javascript:;">Action 3</a>
                                                                        </li>
                                                                        <li>
                                                                          <a href="javascript:;">Action 4</a>
                                                                        </li>
                                                                      </ul>
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                <div class="portlet-body">
                                                                  <div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="60">
                                                                    <div class="timeline">
                                                                      <div class="events-wrapper">
                                                                        <div class="events">
                                                                          <ol>
                                                                            <li>
                                                                              <a href="#0" data-date="16/01/2014" class="border-after-red bg-after-red selected">16 Jan</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="28/02/2014" class="border-after-red bg-after-red">28 Feb</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="20/04/2014" class="border-after-red bg-after-red">20 Mar</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="20/05/2014" class="border-after-red bg-after-red">20 May</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="09/07/2014" class="border-after-red bg-after-red">09 Jul</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="30/08/2014" class="border-after-red bg-after-red">30 Aug</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="15/09/2014" class="border-after-red bg-after-red">15 Sep</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="01/11/2014" class="border-after-red bg-after-red">01 Nov</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="10/12/2014" class="border-after-red bg-after-red">10 Dec</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="19/01/2015" class="border-after-red bg-after-red">29 Jan</a>
                                                                            </li>
                                                                            <li>
                                                                              <a href="#0" data-date="03/03/2015" class="border-after-red bg-after-red">3 Mar</a>
                                                                            </li>
                                                                          </ol>
                                                                          <span class="filling-line bg-red" aria-hidden="true"></span>
                                                                        </div>
                                                                        <!-- .events -->
                                                                      </div>
                                                                      <!-- .events-wrapper -->
                                                                      <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                                                        <li>
                                                                          <a href="#0" class="prev inactive btn btn-outline red md-skip">
                                                                            <i class="fa fa-chevron-left"></i>
                                                                          </a>
                                                                        </li>
                                                                        <li>
                                                                          <a href="#0" class="next btn btn-outline red md-skip">
                                                                            <i class="fa fa-chevron-right"></i>
                                                                          </a>
                                                                        </li>
                                                                      </ul>
                                                                      <!-- .cd-timeline-navigation -->
                                                                    </div>
                                                                    <!-- .timeline -->
                                                                    <div class="events-content">
                                                                      <ol>
                                                                        <li class="selected" data-date="16/01/2014">
                                                                          <div class="mt-title">
                                                                            <h2 class="mt-content-title">New User</h2>
                                                                          </div>
                                                                          <div class="mt-author">
                                                                            <div class="mt-avatar">
                                                                              <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                                            </div>
                                                                            <div class="mt-author-name">
                                                                              <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                            </div>
                                                                            <div class="mt-author-datetime font-grey-mint">16 January 2014 : 7:45 PM</div>
                                                                          </div>
                                                                          <div class="clearfix"></div>
                                                                          <div class="mt-content border-grey-steel">
                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, mi felis, aliquam at iaculis mi felis, aliquam
                                                                              at iaculis finibus eu ex. Integer efficitur tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur odio non est rhoncus volutpat.</p>
                                                                              <a href="javascript:;" class="btn btn-circle red btn-outline">Read More</a>
                                                                              <a href="javascript:;" class="btn btn-circle btn-icon-only blue">
                                                                                <i class="fa fa-plus"></i>
                                                                              </a>
                                                                              <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">
                                                                                <i class="fa fa-twitter"></i>
                                                                              </a>
                                                                            </div>
                                                                          </li>
                                                                          <li data-date="28/02/2014">
                                                                            <div class="mt-title">
                                                                              <h2 class="mt-content-title">Sending Shipment</h2>
                                                                            </div>
                                                                            <div class="mt-author">
                                                                              <div class="mt-avatar">
                                                                                <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                                              </div>
                                                                              <div class="mt-author-name">
                                                                                <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>
                                                                              </div>
                                                                              <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                                                                            </div>
                                                                            <div class="clearfix"></div>
                                                                            <div class="mt-content border-grey-steel">
                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                dignissim luctus risus sed sodales.</p>
                                                                                <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>
                                                                                <div class="btn-group dropup pull-right">
                                                                                  <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                                    <i class="fa fa-angle-down"></i>
                                                                                  </button>
                                                                                  <ul class="dropdown-menu pull-right" role="menu">
                                                                                    <li>
                                                                                      <a href="javascript:;">Action </a>
                                                                                    </li>
                                                                                    <li>
                                                                                      <a href="javascript:;">Another action </a>
                                                                                    </li>
                                                                                    <li>
                                                                                      <a href="javascript:;">Something else here </a>
                                                                                    </li>
                                                                                    <li class="divider"> </li>
                                                                                    <li>
                                                                                      <a href="javascript:;">Separated link </a>
                                                                                    </li>
                                                                                  </ul>
                                                                                </div>
                                                                              </div>
                                                                            </li>
                                                                            <li data-date="20/04/2014">
                                                                              <div class="mt-title">
                                                                                <h2 class="mt-content-title">Blue Chambray</h2>
                                                                              </div>
                                                                              <div class="mt-author">
                                                                                <div class="mt-avatar">
                                                                                  <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                </div>
                                                                                <div class="mt-author-name">
                                                                                  <a href="javascript:;" class="font-blue">Rory Matthew</a>
                                                                                </div>
                                                                                <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                                                                              </div>
                                                                              <div class="clearfix"></div>
                                                                              <div class="mt-content border-grey-steel">
                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                  dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                  odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                  dignissim luctus risus sed sodales.</p>
                                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                    qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                    <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                                                  </div>
                                                                                </li>
                                                                                <li data-date="20/05/2014">
                                                                                  <div class="mt-title">
                                                                                    <h2 class="mt-content-title">Timeline Received</h2>
                                                                                  </div>
                                                                                  <div class="mt-author">
                                                                                    <div class="mt-avatar">
                                                                                      <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                    </div>
                                                                                    <div class="mt-author-name">
                                                                                      <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                    </div>
                                                                                    <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                                                                                  </div>
                                                                                  <div class="clearfix"></div>
                                                                                  <div class="mt-content border-grey-steel">
                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                      dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                      odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                      dignissim luctus risus sed sodales.</p>
                                                                                      <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                    </div>
                                                                                  </li>
                                                                                  <li data-date="09/07/2014">
                                                                                    <div class="mt-title">
                                                                                      <h2 class="mt-content-title">Event Success</h2>
                                                                                    </div>
                                                                                    <div class="mt-author">
                                                                                      <div class="mt-avatar">
                                                                                        <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                      </div>
                                                                                      <div class="mt-author-name">
                                                                                        <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>
                                                                                      </div>
                                                                                      <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="mt-content border-grey-steel">
                                                                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>
                                                                                      <a href="javascript:;"
                                                                                      class="btn btn-circle btn-outline purple-medium">View Summary</a>
                                                                                      <div class="btn-group dropup pull-right">
                                                                                        <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                                          <i class="fa fa-angle-down"></i>
                                                                                        </button>
                                                                                        <ul class="dropdown-menu pull-right" role="menu">
                                                                                          <li>
                                                                                            <a href="javascript:;">Action </a>
                                                                                          </li>
                                                                                          <li>
                                                                                            <a href="javascript:;">Another action </a>
                                                                                          </li>
                                                                                          <li>
                                                                                            <a href="javascript:;">Something else here </a>
                                                                                          </li>
                                                                                          <li class="divider"> </li>
                                                                                          <li>
                                                                                            <a href="javascript:;">Separated link </a>
                                                                                          </li>
                                                                                        </ul>
                                                                                      </div>
                                                                                    </div>
                                                                                  </li>
                                                                                  <li data-date="30/08/2014">
                                                                                    <div class="mt-title">
                                                                                      <h2 class="mt-content-title">Conference Call</h2>
                                                                                    </div>
                                                                                    <div class="mt-author">
                                                                                      <div class="mt-avatar">
                                                                                        <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                      </div>
                                                                                      <div class="mt-author-name">
                                                                                        <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>
                                                                                      </div>
                                                                                      <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                                                                                    </div>
                                                                                    <div class="clearfix"></div>
                                                                                    <div class="mt-content border-grey-steel">
                                                                                      <img class="timeline-body-img pull-left" src="../assets/pages/media/blog/5.jpg" alt="">
                                                                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                          qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                            qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                            <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                                                          </div>
                                                                                        </li>
                                                                                        <li data-date="15/09/2014">
                                                                                          <div class="mt-title">
                                                                                            <h2 class="mt-content-title">Conference Decision</h2>
                                                                                          </div>
                                                                                          <div class="mt-author">
                                                                                            <div class="mt-avatar">
                                                                                              <img src="../assets/pages/media/users/avatar80_5.jpg" />
                                                                                            </div>
                                                                                            <div class="mt-author-name">
                                                                                              <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>
                                                                                            </div>
                                                                                            <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>
                                                                                          </div>
                                                                                          <div class="clearfix"></div>
                                                                                          <div class="mt-content border-grey-steel">
                                                                                            <img class="timeline-body-img pull-right" src="../assets/pages/media/blog/6.jpg" alt="">
                                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                              qui ut.</p>
                                                                                              <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>
                                                                                            </div>
                                                                                          </li>
                                                                                          <li data-date="01/11/2014">
                                                                                            <div class="mt-title">
                                                                                              <h2 class="mt-content-title">Timeline Received</h2>
                                                                                            </div>
                                                                                            <div class="mt-author">
                                                                                              <div class="mt-avatar">
                                                                                                <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                              </div>
                                                                                              <div class="mt-author-name">
                                                                                                <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                              </div>
                                                                                              <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>
                                                                                            </div>
                                                                                            <div class="clearfix"></div>
                                                                                            <div class="mt-content border-grey-steel">
                                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                dignissim luctus risus sed sodales.</p>
                                                                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                              </div>
                                                                                            </li>
                                                                                            <li data-date="10/12/2014">
                                                                                              <div class="mt-title">
                                                                                                <h2 class="mt-content-title">Timeline Received</h2>
                                                                                              </div>
                                                                                              <div class="mt-author">
                                                                                                <div class="mt-avatar">
                                                                                                  <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                </div>
                                                                                                <div class="mt-author-name">
                                                                                                  <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                </div>
                                                                                                <div class="mt-author-datetime font-grey-mint">10 December 2015 : 12:20 PM</div>
                                                                                              </div>
                                                                                              <div class="clearfix"></div>
                                                                                              <div class="mt-content border-grey-steel">
                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                  dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                  odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                  dignissim luctus risus sed sodales.</p>
                                                                                                  <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                </div>
                                                                                              </li>
                                                                                              <li data-date="19/01/2015">
                                                                                                <div class="mt-title">
                                                                                                  <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                </div>
                                                                                                <div class="mt-author">
                                                                                                  <div class="mt-avatar">
                                                                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                  </div>
                                                                                                  <div class="mt-author-name">
                                                                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                  </div>
                                                                                                  <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>
                                                                                                </div>
                                                                                                <div class="clearfix"></div>
                                                                                                <div class="mt-content border-grey-steel">
                                                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                    dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                    odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                    dignissim luctus risus sed sodales.</p>
                                                                                                    <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                  </div>
                                                                                                </li>
                                                                                                <li data-date="03/03/2015">
                                                                                                  <div class="mt-title">
                                                                                                    <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                  </div>
                                                                                                  <div class="mt-author">
                                                                                                    <div class="mt-avatar">
                                                                                                      <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                    </div>
                                                                                                    <div class="mt-author-name">
                                                                                                      <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                    </div>
                                                                                                    <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                                                                                                  </div>
                                                                                                  <div class="clearfix"></div>
                                                                                                  <div class="mt-content border-grey-steel">
                                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                      dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                      odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                      dignissim luctus risus sed sodales.</p>
                                                                                                      <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                    </div>
                                                                                                  </li>
                                                                                                </ol>
                                                                                              </div>
                                                                                              <!-- .events-content -->
                                                                                            </div>
                                                                                          </div>
                                                                                        </div>
                                                                                      </div>
                                                                                      <div class="col-lg-6 col-xs-12 col-sm-12">
                                                                                        <div class="portlet light portlet-fit bordered">
                                                                                          <div class="portlet-title">
                                                                                            <div class="caption">
                                                                                              <i class="icon-directions font-green hide"></i>
                                                                                              <span class="caption-subject bold font-dark uppercase"> Events</span>
                                                                                              <span class="caption-helper">Horizontal Timeline</span>
                                                                                            </div>
                                                                                            <div class="actions">
                                                                                              <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                                                <label class="btn green btn-outline btn-circle btn-sm active">
                                                                                                  <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                                                                  <label class="btn  green btn-outline btn-circle btn-sm">
                                                                                                    <input type="radio" name="options" class="toggle" id="option2">Tools</label>
                                                                                                  </div>
                                                                                                </div>
                                                                                              </div>
                                                                                              <div class="portlet-body">
                                                                                                <div class="cd-horizontal-timeline mt-timeline-horizontal" data-spacing="60">
                                                                                                  <div class="timeline mt-timeline-square">
                                                                                                    <div class="events-wrapper">
                                                                                                      <div class="events">
                                                                                                        <ol>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="16/01/2014" class="border-after-blue bg-after-blue selected">Expo 2016</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="28/02/2014" class="border-after-blue bg-after-blue">New Promo</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="20/04/2014" class="border-after-blue bg-after-blue">Meeting</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="20/05/2014" class="border-after-blue bg-after-blue">Launch</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="09/07/2014" class="border-after-blue bg-after-blue">Party</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="30/08/2014" class="border-after-blue bg-after-blue">Reports</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="15/09/2014" class="border-after-blue bg-after-blue">HR</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="01/11/2014" class="border-after-blue bg-after-blue">IPO</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="10/12/2014" class="border-after-blue bg-after-blue">Board</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="19/01/2015" class="border-after-blue bg-after-blue">Revenue</a>
                                                                                                          </li>
                                                                                                          <li>
                                                                                                            <a href="#0" data-date="03/03/2015" class="border-after-blue bg-after-blue">Dinner</a>
                                                                                                          </li>
                                                                                                        </ol>
                                                                                                        <span class="filling-line bg-blue" aria-hidden="true"></span>
                                                                                                      </div>
                                                                                                      <!-- .events -->
                                                                                                    </div>
                                                                                                    <!-- .events-wrapper -->
                                                                                                    <ul class="cd-timeline-navigation mt-ht-nav-icon">
                                                                                                      <li>
                                                                                                        <a href="#0" class="prev inactive btn blue md-skip">
                                                                                                          <i class="fa fa-chevron-left"></i>
                                                                                                        </a>
                                                                                                      </li>
                                                                                                      <li>
                                                                                                        <a href="#0" class="next btn blue md-skip">
                                                                                                          <i class="fa fa-chevron-right"></i>
                                                                                                        </a>
                                                                                                      </li>
                                                                                                    </ul>
                                                                                                    <!-- .cd-timeline-navigation -->
                                                                                                  </div>
                                                                                                  <!-- .timeline -->
                                                                                                  <div class="events-content">
                                                                                                    <ol>
                                                                                                      <li class="selected" data-date="16/01/2014">
                                                                                                        <div class="mt-title">
                                                                                                          <h2 class="mt-content-title">Expo 2016 Launch</h2>
                                                                                                        </div>
                                                                                                        <div class="mt-author">
                                                                                                          <div class="mt-avatar">
                                                                                                            <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                          </div>
                                                                                                          <div class="mt-author-name">
                                                                                                            <a href="javascript:;" class="font-blue-madison">Lisa Bold</a>
                                                                                                          </div>
                                                                                                          <div class="mt-author-datetime font-grey-mint">23 February 2014</div>
                                                                                                        </div>
                                                                                                        <div class="clearfix"></div>
                                                                                                        <div class="mt-content border-grey-steel">
                                                                                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod mi felis, aliquam at iaculis eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis mi felis, aliquam
                                                                                                            at iaculis eu, onsectetur adipiscing elit finibus eu ex. Integer efficitur leo eget dolor tincidunt, et dignissim risus lacinia. Nam in egestas onsectetur adipiscing elit nunc. Suspendisse
                                                                                                            potenti</p>
                                                                                                            <a href="javascript:;" class="btn btn-circle dark btn-outline">Read More</a>
                                                                                                            <a href="javascript:;" class="btn btn-circle btn-icon-only green pull-right">
                                                                                                              <i class="fa fa-twitter"></i>
                                                                                                            </a>
                                                                                                          </div>
                                                                                                        </li>
                                                                                                        <li data-date="28/02/2014">
                                                                                                          <div class="mt-title">
                                                                                                            <h2 class="mt-content-title">Sending Shipment</h2>
                                                                                                          </div>
                                                                                                          <div class="mt-author">
                                                                                                            <div class="mt-avatar">
                                                                                                              <img src="../assets/pages/media/users/avatar80_3.jpg" />
                                                                                                            </div>
                                                                                                            <div class="mt-author-name">
                                                                                                              <a href="javascript:;" class="font-blue-madison">Hugh Grant</a>
                                                                                                            </div>
                                                                                                            <div class="mt-author-datetime font-grey-mint">28 February 2014 : 10:15 AM</div>
                                                                                                          </div>
                                                                                                          <div class="clearfix"></div>
                                                                                                          <div class="mt-content border-grey-steel">
                                                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                              dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                              odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                              dignissim luctus risus sed sodales.</p>
                                                                                                              <a href="javascript:;" class="btn btn-circle btn-outline green-jungle">Download Shipment List</a>
                                                                                                              <div class="btn-group dropup pull-right">
                                                                                                                <button class="btn btn-circle blue-steel dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                                                                  <i class="fa fa-angle-down"></i>
                                                                                                                </button>
                                                                                                                <ul class="dropdown-menu pull-right" role="menu">
                                                                                                                  <li>
                                                                                                                    <a href="javascript:;">Action </a>
                                                                                                                  </li>
                                                                                                                  <li>
                                                                                                                    <a href="javascript:;">Another action </a>
                                                                                                                  </li>
                                                                                                                  <li>
                                                                                                                    <a href="javascript:;">Something else here </a>
                                                                                                                  </li>
                                                                                                                  <li class="divider"> </li>
                                                                                                                  <li>
                                                                                                                    <a href="javascript:;">Separated link </a>
                                                                                                                  </li>
                                                                                                                </ul>
                                                                                                              </div>
                                                                                                            </div>
                                                                                                          </li>
                                                                                                          <li data-date="20/04/2014">
                                                                                                            <div class="mt-title">
                                                                                                              <h2 class="mt-content-title">Blue Chambray</h2>
                                                                                                            </div>
                                                                                                            <div class="mt-author">
                                                                                                              <div class="mt-avatar">
                                                                                                                <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                                              </div>
                                                                                                              <div class="mt-author-name">
                                                                                                                <a href="javascript:;" class="font-blue">Rory Matthew</a>
                                                                                                              </div>
                                                                                                              <div class="mt-author-datetime font-grey-mint">20 April 2014 : 10:45 PM</div>
                                                                                                            </div>
                                                                                                            <div class="clearfix"></div>
                                                                                                            <div class="mt-content border-grey-steel">
                                                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                dignissim luctus risus sed sodales.</p>
                                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                                                  qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                                                  <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                                                                                </div>
                                                                                                              </li>
                                                                                                              <li data-date="20/05/2014">
                                                                                                                <div class="mt-title">
                                                                                                                  <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                                </div>
                                                                                                                <div class="mt-author">
                                                                                                                  <div class="mt-avatar">
                                                                                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                                  </div>
                                                                                                                  <div class="mt-author-name">
                                                                                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                                  </div>
                                                                                                                  <div class="mt-author-datetime font-grey-mint">20 May 2014 : 12:20 PM</div>
                                                                                                                </div>
                                                                                                                <div class="clearfix"></div>
                                                                                                                <div class="mt-content border-grey-steel">
                                                                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                    dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                    odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                    dignissim luctus risus sed sodales.</p>
                                                                                                                    <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                                  </div>
                                                                                                                </li>
                                                                                                                <li data-date="09/07/2014">
                                                                                                                  <div class="mt-title">
                                                                                                                    <h2 class="mt-content-title">Event Success</h2>
                                                                                                                  </div>
                                                                                                                  <div class="mt-author">
                                                                                                                    <div class="mt-avatar">
                                                                                                                      <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                                                    </div>
                                                                                                                    <div class="mt-author-name">
                                                                                                                      <a href="javascript:;" class="font-blue-madison">Matt Goldman</a>
                                                                                                                    </div>
                                                                                                                    <div class="mt-author-datetime font-grey-mint">9 July 2014 : 8:15 PM</div>
                                                                                                                  </div>
                                                                                                                  <div class="clearfix"></div>
                                                                                                                  <div class="mt-content border-grey-steel">
                                                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde.</p>
                                                                                                                    <a href="javascript:;"
                                                                                                                    class="btn btn-circle btn-outline purple-medium">View Summary</a>
                                                                                                                    <div class="btn-group dropup pull-right">
                                                                                                                      <button class="btn btn-circle green dropdown-toggle" type="button" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="false"> Actions
                                                                                                                        <i class="fa fa-angle-down"></i>
                                                                                                                      </button>
                                                                                                                      <ul class="dropdown-menu pull-right" role="menu">
                                                                                                                        <li>
                                                                                                                          <a href="javascript:;">Action </a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                          <a href="javascript:;">Another action </a>
                                                                                                                        </li>
                                                                                                                        <li>
                                                                                                                          <a href="javascript:;">Something else here </a>
                                                                                                                        </li>
                                                                                                                        <li class="divider"> </li>
                                                                                                                        <li>
                                                                                                                          <a href="javascript:;">Separated link </a>
                                                                                                                        </li>
                                                                                                                      </ul>
                                                                                                                    </div>
                                                                                                                  </div>
                                                                                                                </li>
                                                                                                                <li data-date="30/08/2014">
                                                                                                                  <div class="mt-title">
                                                                                                                    <h2 class="mt-content-title">Conference Call</h2>
                                                                                                                  </div>
                                                                                                                  <div class="mt-author">
                                                                                                                    <div class="mt-avatar">
                                                                                                                      <img src="../assets/pages/media/users/avatar80_1.jpg" />
                                                                                                                    </div>
                                                                                                                    <div class="mt-author-name">
                                                                                                                      <a href="javascript:;" class="font-blue-madison">Rory Matthew</a>
                                                                                                                    </div>
                                                                                                                    <div class="mt-author-datetime font-grey-mint">30 August 2014 : 5:45 PM</div>
                                                                                                                  </div>
                                                                                                                  <div class="clearfix"></div>
                                                                                                                  <div class="mt-content border-grey-steel">
                                                                                                                    <img class="timeline-body-img pull-left" src="../assets/pages/media/blog/5.jpg" alt="">
                                                                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                                                      qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                                                        qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                                                          qui ut. laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis qui ut. </p>
                                                                                                                          <a href="javascript:;" class="btn btn-circle red">Read More</a>
                                                                                                                        </div>
                                                                                                                      </li>
                                                                                                                      <li data-date="15/09/2014">
                                                                                                                        <div class="mt-title">
                                                                                                                          <h2 class="mt-content-title">Conference Decision</h2>
                                                                                                                        </div>
                                                                                                                        <div class="mt-author">
                                                                                                                          <div class="mt-avatar">
                                                                                                                            <img src="../assets/pages/media/users/avatar80_5.jpg" />
                                                                                                                          </div>
                                                                                                                          <div class="mt-author-name">
                                                                                                                            <a href="javascript:;" class="font-blue-madison">Jessica Wolf</a>
                                                                                                                          </div>
                                                                                                                          <div class="mt-author-datetime font-grey-mint">15 September 2014 : 8:30 PM</div>
                                                                                                                        </div>
                                                                                                                        <div class="clearfix"></div>
                                                                                                                        <div class="mt-content border-grey-steel">
                                                                                                                          <img class="timeline-body-img pull-right" src="../assets/pages/media/blog/6.jpg" alt="">
                                                                                                                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad debitis unde? Iste voluptatibus minus veritatis
                                                                                                                            qui ut.</p>
                                                                                                                            <a href="javascript:;" class="btn btn-circle green-sharp">Read More</a>
                                                                                                                          </div>
                                                                                                                        </li>
                                                                                                                        <li data-date="01/11/2014">
                                                                                                                          <div class="mt-title">
                                                                                                                            <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                                          </div>
                                                                                                                          <div class="mt-author">
                                                                                                                            <div class="mt-avatar">
                                                                                                                              <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                                            </div>
                                                                                                                            <div class="mt-author-name">
                                                                                                                              <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                                            </div>
                                                                                                                            <div class="mt-author-datetime font-grey-mint">1 November 2014 : 12:20 PM</div>
                                                                                                                          </div>
                                                                                                                          <div class="clearfix"></div>
                                                                                                                          <div class="mt-content border-grey-steel">
                                                                                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                              dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                              odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                              dignissim luctus risus sed sodales.</p>
                                                                                                                              <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                                            </div>
                                                                                                                          </li>
                                                                                                                          <li data-date="10/12/2014">
                                                                                                                            <div class="mt-title">
                                                                                                                              <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                                            </div>
                                                                                                                            <div class="mt-author">
                                                                                                                              <div class="mt-avatar">
                                                                                                                                <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                                              </div>
                                                                                                                              <div class="mt-author-name">
                                                                                                                                <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                                              </div>
                                                                                                                              <div class="mt-author-datetime font-grey-mint">10 December 2014 : 12:20 PM</div>
                                                                                                                            </div>
                                                                                                                            <div class="clearfix"></div>
                                                                                                                            <div class="mt-content border-grey-steel">
                                                                                                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                                dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                                odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                                dignissim luctus risus sed sodales.</p>
                                                                                                                                <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                                              </div>
                                                                                                                            </li>
                                                                                                                            <li data-date="19/01/2015">
                                                                                                                              <div class="mt-title">
                                                                                                                                <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                                              </div>
                                                                                                                              <div class="mt-author">
                                                                                                                                <div class="mt-avatar">
                                                                                                                                  <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                                                </div>
                                                                                                                                <div class="mt-author-name">
                                                                                                                                  <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                                                </div>
                                                                                                                                <div class="mt-author-datetime font-grey-mint">19 January 2015 : 12:20 PM</div>
                                                                                                                              </div>
                                                                                                                              <div class="clearfix"></div>
                                                                                                                              <div class="mt-content border-grey-steel">
                                                                                                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                                  dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                                  odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                                  dignissim luctus risus sed sodales.</p>
                                                                                                                                  <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li data-date="03/03/2015">
                                                                                                                                <div class="mt-title">
                                                                                                                                  <h2 class="mt-content-title">Timeline Received</h2>
                                                                                                                                </div>
                                                                                                                                <div class="mt-author">
                                                                                                                                  <div class="mt-avatar">
                                                                                                                                    <img src="../assets/pages/media/users/avatar80_2.jpg" />
                                                                                                                                  </div>
                                                                                                                                  <div class="mt-author-name">
                                                                                                                                    <a href="javascript:;" class="font-blue-madison">Andres Iniesta</a>
                                                                                                                                  </div>
                                                                                                                                  <div class="mt-author-datetime font-grey-mint">3 March 2015 : 12:20 PM</div>
                                                                                                                                </div>
                                                                                                                                <div class="clearfix"></div>
                                                                                                                                <div class="mt-content border-grey-steel">
                                                                                                                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam euismod eleifend ipsum, at posuere augue. Pellentesque mi felis, aliquam at iaculis eu, finibus eu ex. Integer efficitur leo eget
                                                                                                                                    dolor tincidunt, et dignissim risus lacinia. Nam in egestas nunc. Suspendisse potenti. Cras ullamcorper tincidunt malesuada. Sed sit amet molestie elit, vel placerat ipsum. Ut consectetur
                                                                                                                                    odio non est rhoncus volutpat. Nullam interdum, neque quis vehicula ornare, lacus elit dignissim purus, quis ultrices erat tortor eget felis. Cras commodo id massa at condimentum. Praesent
                                                                                                                                    dignissim luctus risus sed sodales.</p>
                                                                                                                                    <a href="javascript:;" class="btn btn-circle green-turquoise">Read More</a>
                                                                                                                                  </div>
                                                                                                                                </li>
                                                                                                                              </ol>
                                                                                                                            </div>
                                                                                                                            <!-- .events-content -->
                                                                                                                          </div>
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                    </div>
                                                                                                                  </div>
                                                                                                                  <div class="row">
                                                                                                                    <div class="col-lg-6 col-xs-12 col-sm-12">
                                                                                                                      <div class="portlet light bordered">
                                                                                                                        <div class="portlet-title">
                                                                                                                          <div class="caption">
                                                                                                                            <i class="icon-share font-dark hide"></i>
                                                                                                                            <span class="caption-subject font-dark bold uppercase">Recent Activities</span>
                                                                                                                          </div>
                                                                                                                          <div class="actions">
                                                                                                                            <div class="btn-group">
                                                                                                                              <a class="btn btn-sm blue btn-outline btn-circle" href="javascript:;" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> Filter By
                                                                                                                                <i class="fa fa-angle-down"></i>
                                                                                                                              </a>
                                                                                                                              <div class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                                                                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                                                                                  <input type="checkbox" /> Finance
                                                                                                                                  <span></span>
                                                                                                                                </label>
                                                                                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                                                                                  <input type="checkbox" checked="" /> Membership
                                                                                                                                  <span></span>
                                                                                                                                </label>
                                                                                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                                                                                  <input type="checkbox" /> Customer Support
                                                                                                                                  <span></span>
                                                                                                                                </label>
                                                                                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                                                                                  <input type="checkbox" checked="" /> HR
                                                                                                                                  <span></span>
                                                                                                                                </label>
                                                                                                                                <label class="mt-checkbox mt-checkbox-outline">
                                                                                                                                  <input type="checkbox" /> System
                                                                                                                                  <span></span>
                                                                                                                                </label>
                                                                                                                              </div>
                                                                                                                            </div>
                                                                                                                          </div>
                                                                                                                        </div>
                                                                                                                        <div class="portlet-body">
                                                                                                                          <div class="scroller" style="height: 300px;" data-always-visible="1" data-rail-visible="0">
                                                                                                                            <ul class="feeds">
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-info">
                                                                                                                                        <i class="fa fa-check"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 4 pending tasks.
                                                                                                                                        <span class="label label-sm label-warning "> Take action
                                                                                                                                          <i class="fa fa-share"></i>
                                                                                                                                        </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> Just now </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <a href="javascript:;">
                                                                                                                                  <div class="col1">
                                                                                                                                    <div class="cont">
                                                                                                                                      <div class="cont-col1">
                                                                                                                                        <div class="label label-sm label-success">
                                                                                                                                          <i class="fa fa-bar-chart-o"></i>
                                                                                                                                        </div>
                                                                                                                                      </div>
                                                                                                                                      <div class="cont-col2">
                                                                                                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                  <div class="col2">
                                                                                                                                    <div class="date"> 20 mins </div>
                                                                                                                                  </div>
                                                                                                                                </a>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-danger">
                                                                                                                                        <i class="fa fa-user"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 24 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-info">
                                                                                                                                        <i class="fa fa-shopping-cart"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> New order received with
                                                                                                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 30 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-success">
                                                                                                                                        <i class="fa fa-user"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 24 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-default">
                                                                                                                                        <i class="fa fa-bell-o"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> Web server hardware needs to be upgraded.
                                                                                                                                        <span class="label label-sm label-default "> Overdue </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 2 hours </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <a href="javascript:;">
                                                                                                                                  <div class="col1">
                                                                                                                                    <div class="cont">
                                                                                                                                      <div class="cont-col1">
                                                                                                                                        <div class="label label-sm label-default">
                                                                                                                                          <i class="fa fa-briefcase"></i>
                                                                                                                                        </div>
                                                                                                                                      </div>
                                                                                                                                      <div class="cont-col2">
                                                                                                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                  <div class="col2">
                                                                                                                                    <div class="date"> 20 mins </div>
                                                                                                                                  </div>
                                                                                                                                </a>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-info">
                                                                                                                                        <i class="fa fa-check"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 4 pending tasks.
                                                                                                                                        <span class="label label-sm label-warning "> Take action
                                                                                                                                          <i class="fa fa-share"></i>
                                                                                                                                        </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> Just now </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <a href="javascript:;">
                                                                                                                                  <div class="col1">
                                                                                                                                    <div class="cont">
                                                                                                                                      <div class="cont-col1">
                                                                                                                                        <div class="label label-sm label-danger">
                                                                                                                                          <i class="fa fa-bar-chart-o"></i>
                                                                                                                                        </div>
                                                                                                                                      </div>
                                                                                                                                      <div class="cont-col2">
                                                                                                                                        <div class="desc"> Finance Report for year 2013 has been released. </div>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                  <div class="col2">
                                                                                                                                    <div class="date"> 20 mins </div>
                                                                                                                                  </div>
                                                                                                                                </a>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-default">
                                                                                                                                        <i class="fa fa-user"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 24 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-info">
                                                                                                                                        <i class="fa fa-shopping-cart"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> New order received with
                                                                                                                                        <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 30 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-success">
                                                                                                                                        <i class="fa fa-user"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 24 mins </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <div class="col1">
                                                                                                                                  <div class="cont">
                                                                                                                                    <div class="cont-col1">
                                                                                                                                      <div class="label label-sm label-warning">
                                                                                                                                        <i class="fa fa-bell-o"></i>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                    <div class="cont-col2">
                                                                                                                                      <div class="desc"> Web server hardware needs to be upgraded.
                                                                                                                                        <span class="label label-sm label-default "> Overdue </span>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                </div>
                                                                                                                                <div class="col2">
                                                                                                                                  <div class="date"> 2 hours </div>
                                                                                                                                </div>
                                                                                                                              </li>
                                                                                                                              <li>
                                                                                                                                <a href="javascript:;">
                                                                                                                                  <div class="col1">
                                                                                                                                    <div class="cont">
                                                                                                                                      <div class="cont-col1">
                                                                                                                                        <div class="label label-sm label-info">
                                                                                                                                          <i class="fa fa-briefcase"></i>
                                                                                                                                        </div>
                                                                                                                                      </div>
                                                                                                                                      <div class="cont-col2">
                                                                                                                                        <div class="desc"> IPO Report for year 2013 has been released. </div>
                                                                                                                                      </div>
                                                                                                                                    </div>
                                                                                                                                  </div>
                                                                                                                                  <div class="col2">
                                                                                                                                    <div class="date"> 20 mins </div>
                                                                                                                                  </div>
                                                                                                                                </a>
                                                                                                                              </li>
                                                                                                                            </ul>
                                                                                                                          </div>
                                                                                                                          <div class="scroller-footer">
                                                                                                                            <div class="btn-arrow-link pull-right">
                                                                                                                              <a href="javascript:;">See All Records</a>
                                                                                                                              <i class="icon-arrow-right"></i>
                                                                                                                            </div>
                                                                                                                          </div>
                                                                                                                        </div>
                                                                                                                      </div>
                                                                                                                    </div>

                                                                                                                                                                        </div>
                                                                                                                                                                                                  </div>
