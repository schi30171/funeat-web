<?php

use models\entity\image\Images as Images;
// Load library
$this->load->helper('url');

/**
 * 店家資料
 *
 * @var models\entity\restaurant\Restaurants
 */
$restaurant;

//var_dump($restaurant->logo);
?>
<div class="resBox">
	<div class="resContent">
		<!-- logo -->
		<div class="resImg">
			<img src="<?php echo Images::UPLOAD_PATH, $restaurant->getLogo()->getFilename(); ?>" />
		</div>
		<!-- title -->
		<div class="resTitle">
			<?php echo $restaurant->getName(); ?>
		</div>
		<div class="arrowLeft localTitleArrowLeft"></div>
		<div class="arrowRight localTitleArrowRight"></div>
		<div style="padding-top: 220px;"></div>
		<!-- gallery -->
		<div class="resGalleryBox">
			<div class="gallery">
				<div class="galleryMenu">
					<?php foreach ($restaurant->getGallery() as $gallery):
					?>
					<div class="galleryItem">
						<img src="<?php echo Images::UPLOAD_PATH, $gallery->getFilename(); ?>" />
					</div>
					<?php endforeach; ?>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="arrowLeft galleryArrowLeft" ></div>
		<div class="arrowRight galleryArrowRight"></div>
		<div style="padding-top: 400px;"></div>
		<!-- info -->
		<div class="resDescBox">
			<div class="resInfoBox">
				<div class="resInfoMenu">
					<div class="resInfoItem">
						<img src="img/icon/res_address.png" />
						<div class="resInfoItemDesc">
							<?php echo $restaurant->getAddress(); ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="resInfoItem">
						<img src="img/icon/res_phone.png" />
						<div class="resInfoItemDesc">
							<?php echo $restaurant->getTel(); ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="resInfoItem">
						<img src="img/icon/res_time.png" />
						<div class="resInfoItemDesc">
							<!-- TODO: Hours design -->
							0900 - 1800
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="resInfoItem">
						<img src="img/icon/res_time.png" />
						<div class="resInfoItemDesc">
							<?php echo "NT. {$restaurant->getPriceLow()} ~ NT. {$restaurant->getPriceHigh()}"; ?>
						</div>
						<div class="clearfix"></div>
					</div>
					<br>
					<br>
					<div class="resInfoItem">
						<div class="resLikeBtnBox">
							<div class="resLikeBtn">
								<img src="img/icon/like.png" />
							</div>
						</div>
						<div class="resLikeCount">
							<?php echo $restaurant->getLike()->count(); ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="resServiceBox">
				123
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="arrowRight descArrowRight"></div>
		<!-- map -->
		<div class="resMapBox">
			<div class="resMapTopShadow"></div>
			<div class="resMapBottomShadow"></div>
			<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=zh-TW&amp;geocode=&amp;q=%E5%8F%B0%E4%B8%AD%E5%B8%82%E5%8C%97%E5%B1%AF%E5%8D%80+%E5%A4%A7%E9%80%A3%E8%B7%AF%E4%B8%89%E6%AE%B5%E5%8D%81%E8%99%9F&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=55.849851,135.263672&amp;ie=UTF8&amp;hq=%E5%A4%A7%E9%80%A3%E8%B7%AF%E4%B8%89%E6%AE%B5%E5%8D%81%E8%99%9F&amp;hnear=%E5%8F%B0%E7%81%A3%E5%8F%B0%E4%B8%AD%E5%B8%82%E5%8C%97%E5%B1%AF%E5%8D%80&amp;ll=24.178009,120.718443&amp;spn=0.006454,0.067311&amp;t=m&amp;output=embed"></iframe>
		</div>
		<div class="otherStoreBox">
			<div class="otherStoreBtn">
				顯示其他分店
			</div>
			<div class="clearfix"></div>
		</div>
		<!-- menu -->
		<div class="resFoodMenuBox">
			<div class="resFoodMenuTitle">
				Menu
			</div>
			<?php foreach ($restaurant->getMenu() as $menu):
			?>
			<div class="resFoodMenuImg">
				<img src="<?php echo Images::UPLOAD_PATH, $menu->getFilename(); ?>" />
			</div>
			<?php endforeach; ?>
		</div>
		<div class="resDiscussBox">
			<div class="resDiscussTitle">
				留言討論
			</div>
			<div class="resDiscussMenu">
				<div class="resDiscussItem">
					<div class="resDiscussImg">
						<img src="" />
					</div>
					<div class="msgArrow"></div>
					<div class="resDiscussMsgBox">
						<div class="resDiscussMsgName">
							name
						</div>
						<div class="resDiscussMsgDesc">
							descriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescriptiondescr12312321 iptiondescriptiondescriptiondescriptiondescription
						</div>
						<div class="resDiscussMsgBar">
							<div class="resDiscussMsgBarItem">
								<div class="left likeBtn">
									讚
								</div>
								<div class="replyBtn">
									回覆
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!-- reply -->
				<div class="resDiscussItem replyDiscussItem">
					<div class="resDiscussImg replyDiscussImg">
						<img src="" />
					</div>
					<div class="msgArrow replyArrow"></div>
					<div class="resDiscussMsgBox replyDiscussMsgBox">
						<div class="resDiscussMsgName">
							name
						</div>
						<div class="resDiscussMsgDesc">
							teareafaksljf
						</div>
						<div class="resDiscussMsgBar">
							<div class="resDiscussMsgBarItem">
								<div class="left likeBtn">
									讚
								</div>
								<div class="replyBtn">
									回覆
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="resDiscussItem">
					<div class="resDiscussImg">
						<img src="" />
					</div>
					<div class="msgArrow"></div>
					<div class="resDiscussMsgBox">
						<div class="resDiscussMsgName">
							name
						</div>
						<div class="resDiscussMsgDesc">
							description
						</div>
						<div class="resDiscussMsgBar">
							<div class="resDiscussMsgBarItem">
								<div class="left likeBtn">
									讚
								</div>
								<div class="replyBtn">
									回覆
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
		<div style="height: 20px;"></div>
	</div>
</div>
