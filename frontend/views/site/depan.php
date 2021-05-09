				<?php use yii\helpers\URL;?>
<!------------------------- ABOUT -->
        
        <div id="about">
            <a id="logo_big" title="Nekergames" href="index.html"></a>
            <div id="headline" class="left grid">
                <h1>Neker Games</h1>
                <h2><span>Independent Game Development Studio</span><br /><a href="mailto:<?= $studio->email?>"><?= $studio->email?></a></h2>
            </div>
            <!--<div id="about_pict" class="grid"><img src="images/my_picture.jpg" alt="Mihai Balea | Portfolio" /></div>-->
            <div class="clear">&nbsp;</div>
            <div class="left grid"></div>
            <div class="left grid about_text">
				<p>
					<?= $studio->des_perusahaan?>
				</p>
            </div>
            <div class="right grid about_text">
				<p>
					Kontak
					<ul>
					<li><strong>Telp. : <?= $studio->tel?></strong></li>
					<li><strong>Email : <?= $studio->email ?></strong></li>
					<li><strong>FB : <?= 'facebook.com/'.$studio->fb ?></strong></li>
					</ul>
					Alamat
					<ul>
					<li><strong><?= $studio->alamat_1?></strong></li>
					<li><strong><?= $studio->alamat_2.' '.$studio->kode_pos?></strong></li>
					</ul>
				</p>
            </div>
			<div class="clear"></div>
		</div><!-- end div #about -->

        <div class="clear"></div>

<!------------------------- WORK -->

        <div id="work">
            <h2>Work.</h2>
            <div class="projectsContainer">
                <div id="project" class="item_details">
                    <div class="slide_inner"></div>
                	<div class="next_slide">&nbsp;</div>
                    <div class="prev_slide">&nbsp;</div>
<!-- WORK 1 -->
					<?php foreach($model as $key=>$work) {?>
                    <div class="prjinfo" id="iit_<?= $key?>">
                        <div class="item_slider">
                            <ul>
                                <li class="iit_<?= $key?> pic selected"><img width="592" height="400" src="<?= URL::base()?>/../../backend/web/uploads/g7yrgfk/<?= $work->foto?>" alt="<?= $work->judul?>" /></li>
                                <li class="iit_<?= $key?> pic"><img src="<?= URL::base()?>/../../backend/web/uploads/g7yrgfk/<?= $work->foto?>" alt="<?= $work->judul?>" /></li>
                                <li class="iit_<?= $key?> pic"><img src="<?= URL::base()?>/../../backend/web/uploads/g7yrgfk/<?= $work->foto?>" alt="<?= $work->judul?>" /></li>
                            </ul> 
                        </div>
                        <div class="item_text">
                            <h3><?= $work->judul?></h3>
                            <div class="clear"></div>
                            <h4>Overview:</h4>
                            <div class="clear"></div>
                            <p><?= $work->keterangan?></p>
                            <h5>Year: <span><?= $work->tahun?></span></h5>
                            <a href="<?= $work->link_demo?>" title="My Work 1" target="_blank" class="btn_see_it_live">See it live</a>
                            <div class="close_item_info">&nbsp;</div>
                        </div>
                    </div><!-- end div #iit_1 -->
					<?php }?>
                </div><!-- end div #project -->
                
<!-- WORKS GRID -->

            	<div class="prjGrid">
                	<?php foreach($model as $key=>$work) {?>
					<div id="it_<?= $key+1?>" class="item <?= (($key+1)%3 == 0?'last':'')?>" >
                    	<img width="290" height="217" src="<?= URL::base()?>/../../backend/web/uploads/g7yrgfk/<?= $work->foto?>" alt="My Work 1" />
                        <span class="hover">
                        	<span class='h3'><?= $work->judul?></span>
                        </span>
                    </div>
					<?php }?>
                </div><!-- end div .prjGrid -->
				
            </div><!-- end div .projectsContainer -->
          <div class="clear"></div>  
        </div><!-- end div #work -->
        <div class="clear"></div>
        
<!------------------------- PROJECTS -->
        
        <div id="projects">
            <h2>Projects.</h2>
            <div class="projectsContainer">
<!-- PROJECT 1 -->
				<?php foreach($model as $key=>$work) {?>
                <div class="pprj">
                    <div class="grid left">
                        <div class="item">
                            <img width="290" height="350" src="<?= URL::base()?>/../../backend/web/uploads/g7yrgfk/<?= $work->foto?>" alt="<?= $work->judul?>" />
                            <a class="hover" href="<?= $work->link_demo?>" title="<?= $work->judul?>" target="_blank"><span class='h3'><?= $work->judul?></span></a>
                        </div>    
                    </div>
                    <div class="item_text">
                        <h3><?= $work->judul?></h3>
                            <div class="clear"></div>
                            <a href="<?= $work->link_demo?>" title="Project Name 1" target="_blank" class="btn_see_it_live">www.sitename.com</a>
                    </div>
                    <div class="item_text second">
                        <h4>Overview:</h4>
                            <div class="clear"></div>
                            <p><?= $work->keterangan?>
                            </p>
                            <h5>Year: <span><?= $work->tahun?></span></h5>
                    </div>
                </div><!-- end div .pprj -->
				<?php }?>
			</div>
        <div class="clear"></div>
		</div>
		
		        <div class="clear"></div>
<!------------------------- CONTACT -->
        <div id="contact">
            <h2>Contact.</h2>
            <div class="clear"></div>
            <div class="contactContainer">
                <h3>Get in touch:</h3>
            	<div class="contact">
                    <form action="index.php?r=site" method="post" id="contactForm">
					<input type="hidden" name="_csrf" value="<?= Yii::$app->request->getCsrfToken()?>" />
                    <ul>
                    <li>
                    <label for="name">Name:</label>
                    <input type="text" name="name" value="" maxlength="50" required id="name" />
                    </li>
                    <li>
                    <label for="email">Email:</label>
                    <input type="email" name="email" value="" required id="email" />
                    </li>
                    <li class="special" style="display: none;">
                    <label for="last">Don't fill this in:</label>
                    <input type="text" name="last" value="" id="last" />
                    </li>
                    <li>
                    <label for="message">Message:</label><textarea rows="5" required name="message"></textarea>
                    </li>
                    <li class="submitbutton">
                    <input type="submit" class="btn" value="Send Message" />
                    </li>
                    </ul>
                    </form>
                </div>
                <div class="message"><div id="alert"></div></div>
				<p style="margin-top: 30px;">@Copyright <a href="http://www.nekergames.com">Nekergames</a></p>
            </div><!-- end div .contactContainer -->

            <div class="clear"></div>
			
			
           <div id="btn_top"></div> 
        </div><!-- end div #contact -->