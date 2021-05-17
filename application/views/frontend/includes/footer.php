<?php
$lang = lang() == 'english' ? 'en' : 'ar';
?>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/jquery.validate.js" integrity="sha384-QYr0Jb/x/vYoPGUFXkCz0h5Aq5+wFwjsiwCWsbgGk+SoBt1NlaFip4L4AB1L3hGz" crossorigin="anonymous"></script>
<!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/frontend/js/bootstrap-confirmation.js" integrity="sha384-pKyMMamvoZ5Tl9dqLIriIOplxM4yl4lDiMikOIQh1X31VHB8qjVFXjNOAIFPGoar" crossorigin="anonymous"></script> -->
<!-- <script type="text/javascript" src="<?php //echo base_url(); 
											?>assets/frontend/js/sweetalert.min.js" integrity="sha384-RIQuldGV8mnjGdob13cay/K1AJa+LR7VKHqSXrrB5DPGryn4pMUXRLh92Ev8KlGF" crossorigin="anonymous"></script> -->


<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        AOS.init({
            duration: 1000
        });

    });
</script>

<?php if (isset($_SESSION['site_lang']) && $_SESSION['site_lang'] == 'english') {


	$succ_msg = 'Item has been added to your cart.';

	$congrats = 'Congratulations';

?>


<?php
} else {
?>

	<?php
	$succ_msg = 'تمّت إضافة المُنتجات بنجاح إلى القائمة';

	$congrats = 'تهانينا';
	?>

<?php } ?>


<script>
	function updateAjaxQuantity(rowid, quantity) {
		$.ajax({
			url: "<?php echo base_url(); ?>cart/updateCartQuantity",
			type: 'post',
			dataType: 'json',
			data: {
				'rowid': rowid,
				'qty': quantity
			},
			success: function(data) {

			},
			error: function(data) {

			}
		})
	}
	
	$(document).ready(function() {
		var mobile = false;
		if ($(window).width() < 768) {
			mobile = true;
		}
		$(".level1 a").click(function(){
			$(this).css('padding','1.3rem 0');
			$(this).find('img').hide();
			$('.level1').children('ul').addClass('dropdown-opened');
		});
		$(".level2 a").click(function(){
			$(this).css('padding','1.3rem 0');
			$(this).find('img').hide();
			$('.level2').children('ul').addClass('dropdown-opened');
			$(".second").hide();
			$(".third").hide();
			$(".first").show();
		});

		$(".level_deb a").click(function(){
			$(this).css('padding','1.3rem 0');
			$(this).find('img').hide();
			$('.level_deb').children('ul').addClass('dropdown-opened');
			$(".first").hide();
			$(".third").hide();
			$(".second").show();
		});

		$(".level_gift a").click(function(){
			$(this).css('padding','1.3rem 0');
			$(this).find('img').hide();
			$('.level_gift').children('ul').addClass('dropdown-opened');
			$(".first").hide();
			$(".second").hide();
			$(".third").show();
		});

		if (!mobile) {
			$(".dropdown")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '25%');
					var url = '<?= base_url('./assets/frontend/images/chevron-over.png') ?>';
					$(this).children('a').find('img').attr("src", url); //URL @the time of mouse over on image
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
					var url = '<?= base_url('./assets/frontend/images/chevron.png') ?>';
					$(this).find('img').attr("src", url); //URL @the time of mouse over on image
					// $('.level2').children('ul').removeClass('dropdown-opened');
					// $('.level1').children('ul').removeClass('dropdown-opened');
				});
			$(".level2")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '45%');
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
				});
		}

		if (!mobile) {
			$(".dropdown")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '25%');
					var url = '<?= base_url('./assets/frontend/images/chevron-over.png') ?>';
				$(this).children('a').find('img').attr("src", url); //URL @the time of mouse over on image
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
					var url = '<?= base_url('./assets/frontend/images/chevron.png') ?>';
				$(this).find('img').attr("src", url); //URL @the time of mouse over on image
				// $('.level2').children('ul').removeClass('dropdown-opened');
				// $('.level1').children('ul').removeClass('dropdown-opened');
				});
			$(".level_deb")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '45%');
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
				});
		}

		if (!mobile) {
			$(".dropdown")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '25%');
					var url = '<?= base_url('./assets/frontend/images/chevron-over.png') ?>';
				$(this).children('a').find('img').attr("src", url); //URL @the time of mouse over on image
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
					var url = '<?= base_url('./assets/frontend/images/chevron.png') ?>';
				$(this).find('img').attr("src", url); //URL @the time of mouse over on image
				// $('.level2').children('ul').removeClass('dropdown-opened');
				// $('.level1').children('ul').removeClass('dropdown-opened');
				});
			$(".level_gift")
				.mouseover(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', '45%');
				})
				.mouseout(function(e) {
					e.preventDefault();
					e.stopPropagation();
					$('.home-wrapper').css('left', 'auto');
				});
		}

		var x, i, j, l, ll, selElmnt, a, b, c;
		/*look for any elements with the class "custom-select":*/
		x = document.getElementsByClassName("custom-select");
		l = x.length;
		for (i = 0; i < l; i++) {
			selElmnt = x[i].getElementsByTagName("select")[0];
			ll = selElmnt.length;
			/*for each element, create a new DIV that will act as the selected item:*/
			a = document.createElement("DIV");
			a.setAttribute("class", "select-selected");
			a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
			x[i].appendChild(a);
			/*for each element, create a new DIV that will contain the option list:*/
			b = document.createElement("DIV");
			b.setAttribute("class", "select-items select-hide cart-custom-scroll");
			for (j = 0; j < ll; j++) {
				/*for each option in the original select element,
				create a new DIV that will act as an option item:*/
				c = document.createElement("DIV");
				c.innerHTML = selElmnt.options[j].innerHTML;
				c.addEventListener("click", function(e) {
					/*when an item is clicked, update the original select box,
					and the selected item:*/
					var y, i, k, s, h, sl, yl;
					s = this.parentNode.parentNode.getElementsByTagName("select")[0];
					sl = s.length;
					h = this.parentNode.previousSibling;
					for (i = 0; i < sl; i++) {
						if (s.options[i].innerHTML == this.innerHTML) {
							s.selectedIndex = i;
							h.innerHTML = this.innerHTML;
							y = this.parentNode.getElementsByClassName("same-as-selected");
							yl = y.length;
							for (k = 0; k < yl; k++) {
								y[k].removeAttribute("class");
							}
							this.setAttribute("class", "same-as-selected");
							break;
						}
					}
					h.click();
					$('input[name=all]').attr('checked', false);
					$('form.searchFrm').submit();
					$('.custom-control-input').prop('checked', false);
				});
				b.appendChild(c);
			}
			x[i].appendChild(b);
			a.addEventListener("click", function(e) {
				/*when the select box is clicked, close any other select boxes,
				and open/close the current select box:*/
				e.stopPropagation();
				closeAllSelect(this);
				this.nextSibling.classList.toggle("select-hide");
				this.classList.toggle("select-arrow-active");
			});
		}

		function closeAllSelect(elmnt) {
			/*a function that will close all select boxes in the document,
			except the current select box:*/
			var x, y, i, xl, yl, arrNo = [];
			x = document.getElementsByClassName("select-items");
			y = document.getElementsByClassName("select-selected");
			xl = x.length;
			yl = y.length;
			for (i = 0; i < yl; i++) {
				if (elmnt == y[i]) {
					arrNo.push(i)
				} else {
					y[i].classList.remove("select-arrow-active");
				}
			}
			for (i = 0; i < xl; i++) {
				if (arrNo.indexOf(i)) {
					x[i].classList.add("select-hide");
				}
			}
		}
		/*if the user clicks anywhere outside the select box,
		then close all select boxes:*/
		document.addEventListener("click", closeAllSelect);
	});

	$(".add-to-cart").click(function() {
		id = $(this).attr('data-id');
		// quatity = $("#quantity").val();
		quatity = 1;
		$.ajax({
			url: "<?php echo base_url(); ?>cart/add/" + id + "/" + quatity,
			type: 'post',
			data: {
				'id': id,
				'quantity': quatity
			},
			success: function(data) {
				var resp = jQuery.parseJSON(data);
				if (resp.success == 'true') {
					$('.cart-item').show();
					// swal("<?php //echo $congrats; 
								?>", "<?php echo $succ_msg; ?>", "success");
					$("#sidebar-cart").hide();
					var count = $('.cart-count').text();
					$('.cart-count').text(parseInt(count) + 1);
					$("#sidebar-cart-full").show();
					$("#myModal").modal('hide');
					
					location.reload(true);

				} else {
					alert("There is something Wrong,")
				}
			},
			error: function(data) {
				alert("There is something Wrong,")
			}
		});

	});

	function openSearch() {
		document.getElementById("myOverlay").style.display = "block";
	}

	// Close the full screen search box
	function closeSearch() {
		document.getElementById("myOverlay").style.display = "none";
	}

	var timer = new IntervalTimer(function() {
		$current = $('#slider').find('.active');
		$($current).removeClass('active');
		$($current).removeClass('animate-in');
		$('.narrow-content').removeClass('animate-out');
		$($current).addClass('animate-out');
		if ($($current).next('.narrow-content').length) {
			$($current).next('.narrow-content').addClass('active');
			$($current).next('.narrow-content').addClass('animate-in');
		} else {
			$('#slide-0').addClass('active');
			$('#slide-0').addClass('animate-in');
		}
	}, 10000);

	function IntervalTimer(callback, interval) {
		var timerId, startTime, remaining = 0;
		var state = 0; //  0 = idle, 1 = running, 2 = paused, 3= resumed

		this.pause = function() {
			if (state != 1) return;

			remaining = interval - (new Date() - startTime);
			window.clearInterval(timerId);
			state = 2;
		};

		this.resume = function() {
			if (state != 2) return;

			state = 3;
			window.setTimeout(this.timeoutCallback, remaining);
		};

		this.timeoutCallback = function() {
			if (state != 3) return;

			callback();

			startTime = new Date();
			timerId = window.setInterval(callback, interval);
			state = 1;
		};

		startTime = new Date();
		timerId = window.setInterval(callback, interval);
		state = 1;
	}

	function toggleMenu(e) {
		e.classList.toggle("active");
		document.querySelector("aside").classList.toggle("active");
		if ($('.toggle-wrap').hasClass('active')) {
			timer.pause();
		} else {
			timer.resume();
		}
	}

	$('.select-selected').on('change', function() {
	alert();
	});


</script>

<div id="myOverlay" class="overlay">
	<span class="closebtn" onclick="closeSearch()" title="Close Overlay"><img src="<?= base_url('assets/frontend/images/close-search.svg') ?>" /></span>
	<div class="overlay-content">
		<form action="<?= base_url($lang . '/products') ?>">
			<input type="text" placeholder="<?= $this->lang->line('SEARCH') ?>" class="form-control searchh" name="search">
			<button type="submit"><img src="<?= base_url('assets/frontend/images/search-big.svg') ?>" /></button>
		</form>
	</div>
</div>
