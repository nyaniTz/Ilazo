//Global variables of the system
var dn = "NnpHOFRYV3VNbk1TMGM5RktsVytzalRMakx4Wm5IUDQ4MVM2TEF2Syt3ND06OhLmRkmbtaCEiTNR3Upf4TA=";

$(document).ready(function () {
    
    // ------- Hide Payment Section until Payment Complete is Selected -----
  $("#addPaymentSection").hide();
    
    sendHappyBirthDayEmailToCustomers();
    sendAppointmentFirstReminderEmailToCustomers();
    sendAppointmentSecondReminderEmailToCustomers();
		
	//Global events of the system
	$("#custTelNoUp, #custTelNo").bind("keypress", function (e) {
        var keyCode = e.which ? e.which : e.keyCode;            
        if (!(keyCode >= 48 && keyCode <= 57)) {
            return false;
        }
    });

	// ============================ Start of Customer Information Section ==========================================

	// ----------------------- Register Customer Modal ---------------------

	$("#registerCustomerForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#customerName").val() + "###" + $("#custoEmailAddress").val() + "###" + $("#customerPassword").val() + "###" + $("#custBirthDate").val() + "###" + $("#customerGender").val() + "###" + "Other" + "###" + "Other" + "###" + $("#custTelNo").val() + "###" + $("#custAddress").val() + "###" + $("#custRegisterDate").val() + "###" + "NoConfirmationCode" + "###" + "Complete";

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoCust1";

		var tn = "VWlKYkxYa0xNNDZsTHptNnBkMlUyZz09OjoxtPkAlYOgQhiDb/rtTLbj";
		var commandType = "insert_command";

		var objName = "Customer";
		var objPre = "CU";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoCust1", $("#customerPhoto")[0].files[0]);
		//formData.append("docCust1", $("#custIdentDoc")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#regCustomer").prop('disabled', true);
				$("#regCustomer").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
			    console.log('Create Customer Success::', data);
				$("#regCustomer").prop('disabled', false);
				$("#regCustomer").html("<i class='fa fa-lg fa-save'></i> Register Customer");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
		 	    console.log('Create Customer Error: ', e);
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ------------------- Update Staff Web Details -------------------
  $("#updateStaffWebDetailsForm").on("submit", function (e) {
    e.preventDefault();

    var formData = new FormData(this);

    var vl =
      $("#updateStaffId").val() +
      "###" +
      $("#updateStaffName").val() +
      "###" +
      $("#updateStaffTitle").val() +
      "###" +
      $("#updateStaffRegDate").val() +
      "###" +
      $("#updateStaffPhotoSrcTarget").attr('src');

    var cm =
      "staff_id" +
      "###" +
      "staff_name" +
      "###" +
      "staff_title" +
      "###" +
      "regDate" +
      "###" +
      "staff_photo";

    var hasFile = "No";

    // var files = "photoCust1###docCust1";

    var tn = "staff_web";
    var commandType = "update_command";

    var objName = "Staff";

    formData.append("action", "ins_upd_del_everything");
    formData.append("vl", vl);
    formData.append("cm", cm);
    formData.append("hasFile", hasFile);

    formData.append("commandType", commandType);
    formData.append("skipEncryption", true);
    formData.append("skipTNEncryption", true);
    formData.append("tn", tn);
    formData.append("objName", objName);

    $.ajax({
      url: "api/main.php",
      type: "POST",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        $("#btnUpdateStaff").prop("disabled", true);
        $("#btnUpdateStaff").html(
          "<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait"
        );
      },
      success: function (data) {
		console.log("Update STaff Web::", data);
        $("#btnUpdateStaff").prop("disabled", false);
        $("#btnUpdateStaff").html(
          '<i class="fa fa-fw fa-lg fa-save"></i>Update Staff '
        );
        var Message = data.Message;
        var status = data.Status;
        if (status === true) {
          swal(
            {
              title: "",
              text: Message,
              type: "success",
              showCancelButton: false,
              closeOnConfirm: false,
              closeOnCancel: false,
            },
            function (isConfirm) {
              if (isConfirm) {
                location.reload();
              }
            }
          );
        } else {
          Message.forEach(function (error) {
            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
              type: "danger",
              position: "topright",
              appendType: "append",
            });
          });
        }
      },
      error: function (e) {
        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
          type: "danger",
          position: "topright",
          appendType: "append",
        });
      },
    });
  });
	
	
	
	// ----------------------- Update Staff Modal ---------------------
	$(document).on("click", ".btnUpdateStaffWeb", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn =  "staff_web";
		var cm = "staff_id";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"skipEncryption": true,
			"skipTNEncryption": true,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
			    
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					console.log("data", returned_info)
					$("#updateStaffId").val(returned_info[1]);
					$("#updateStaffName").val(returned_info[2]);
					$("#updateStaffTitle").val(returned_info[3]);
					$("#updateStaffRegDate").val(returned_info[4]);
					$("#updateStaffUserId").val(returned_info[7]);
					$("#updateStaffPhotoSrcTarget").attr("src", returned_info[5]);
					
				}	
		 	}, error: function(e) {
		 	   
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});	
	
	// ----------------------- Filling Data into Customer Modal ---------------------
	$(document).on("click", ".btnUpdateCustomer", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn =  "VWlKYkxYa0xNNDZsTHptNnBkMlUyZz09OjoxtPkAlYOgQhiDb/rtTLbj";
		var cm = "TzNBK2xMdFc3d0RXelVYd3FDaVBiUT09Ojqi+shwMQbhnwirDQt87eZX";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
			    
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					console.log("data", returned_info)
					$("#custIDUp").val(returned_info[1]);
					$("#customerNameUp").val(returned_info[2]);
					$("#customerEmailAddressUp").val(returned_info[3]);
					$("#customerPasswordUp").val(returned_info[4]);
					$("#custMotherNameUp").val(returned_info[3]);
					$("#customerGenderUp").val(returned_info[6]);
					
					$("#custBirthDateUp").val(returned_info[5]);
					$("#custIdentDocTypeUp").select2().val(returned_info[6]).trigger('change');
					$("#custIdDocNoUp").val(returned_info[7]);
					$("#custAddressUp").val(returned_info[10]);
					$("#custTelNoUp").val(returned_info[9]);
					$("#customerTargetUp").attr("src", returned_info[14]);
					//$("#photoCust1").val(returned_info[11]);
					//$("#docCust1").val(returned_info[12]);
					
				}	
		 	}, error: function(e) {
		 	   
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Update Customer Modal ---------------------
	
	$(document).on("change", "#custIdentDocTypeUp", function () {
		var getSelectedDocType = $(this).val();
		
		if (getSelectedDocType == "Others") {
			$("#custIdDocNoUp").prop("readonly", true);
			$("#custIdDocNoUp").val("---------");
		} else {
			$("#custIdDocNoUp").prop("readonly", false);
			$("#custIdDocNoUp").val("");
		}
	});

	$("#updateCustomerForm").on('submit', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);

		// var vl = $("#custIDUp").val() + "###" + $("#customerNameUp").val() + "###" + $("#custMotherNameUp").val() + "###" + $("#custBirthPlaceUp").val() + "###" + $("#custBirthDateUp").val() + "###" + $("#custIdentDocTypeUp").val() + "###" + $("#custIdDocNoUp").val() + "###" + $("#custAddressUp").val() + "###" + $("#custTelNoUp").val();
		var vl = $("#custIDUp").val() + "###" + $("#customerNameUp").val() + "###" + $("#customerPasswordUp").val() + "###" + $("#customerEmailAddressUp").val() + "###" + $("#custAddressUp").val() + "###" + $("#custTelNoUp").val() + "###" + $("#customerGenderUp").val() + "###" + $("#custBirthDateUp").val();
		// var cm = "OXdKUklXNm5ITWsxcGRsQUhDNWxaWkFwOXhhRWZ0bnFqTE1SVTRsZDRVN3hiSWxqandBdUd6b25EblZZNUdyMmRCYytRa0RmM051ZWw1MU02bUYydlBVTHZuaU1WTllvZkRIYXVScWVCM1BSUHpoNkVocGw2bUdjeHRYcjB6UGpUVWtqSUN5VmFXblp2UkthODNiNXM2Rlc4LzArUjBNRUs3MnFmTU81MHJHVDN0cUQ4bWlaRnpCTEhmRDJ2TTBVOjq0A7VGPT+0I9A+cIE4GxPl";
		var cm = "customerID" + "###" + "customerName" + "###" + "password" + "###" + "emailAddress" + "###" + "customerAddress" + "###" + "telephoneNo" + "###" + "customerGender" + "###" + "dateOfBirth";

		// var photoNames = $("#photoCust1").val();
		// var docNames = $("#docCust1").val();

		var hasFile = "No";

		// var files = "photoCust1###docCust1";

		var tn = "VWlKYkxYa0xNNDZsTHptNnBkMlUyZz09OjoxtPkAlYOgQhiDb/rtTLbj";
		var commandType = "update_command";

		var objName = "Customer";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("cm", cm);
		formData.append("hasFile", hasFile);
		// formData.append("files", files);
		// formData.append("photoCust1", $("#customerPhotoUp")[0].files[0]);
		// formData.append("docCust1", $("#custIdentDocUp")[0].files[0]);
		// formData.append("photoNames", photoNames);
		// formData.append("docNames", docNames);
		formData.append("commandType", commandType);
		formData.append("skipEncryption", true);
		formData.append("tn", tn);
		formData.append("objName", objName);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#updateCustomer").prop('disabled', true);
				$("#updateCustomer").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#updateCustomer").prop('disabled', false);
				$("#updateCustomer").html("<i class='fa fa-lg fa-pencil'></i> Update Customer");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});





	
	// ----------------------- Deleting Service Information ---------------------
	$(document).on('click', '.btnDeleteServicee', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "aVR0M3dqMHpSQXVxMmdkSGlmS2NCdz09Ojritbdu28KkqkQFiVBRyZgY";
		var tn = "cVVJdnpqU0ZXcmJFYjR4dnN6ZFI5QT09Ojpuy+4vdKjbCTA0W11PhqkW";
		var commandType = "delete_command";
		var objName = "Service";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure?", text: "Are you sure you want to delete this service?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Service has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete cancelled", "Service deletion cancelled", "");
			}
		});

	});
	
	// ============================ End of Service Information Section ========================================

	// ============================ Upload Slideshow Images of the Website =====================================
	
	$("#uploadSlideShowImageForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#slideShowuploadDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoSlideShow1";

		var tn = "QmJLbWQxOEd3NjZjSTZpclE3dE5WcmtCeDZSUktIbzJ6bGNKd1p2ZkZuaz06OnTj6CCBzBek25RNiPejIpc=";
		var commandType = "insert_command";

		var objName = "Slideshow image";
		var objPre = "slideshow";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoSlideShow1", $("#slideShowImageSrc")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnUploadSlideSHowImage").prop('disabled', true);
				$("#btnUploadSlideSHowImage").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUploadSlideSHowImage").prop('disabled', false);
				$("#btnUploadSlideSHowImage").html("<i class='fa fa-lg fa-send'></i> Upload Image");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting SlideShow Image ---------------------
	$(document).on('click', '.btnDeleteSideShowImage', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "QmJLbWQxOEd3NjZjSTZpclE3dE5WcmtCeDZSUktIbzJ6bGNKd1p2ZkZuaz06OnTj6CCBzBek25RNiPejIpc=";
		var cm = "TUFIcGwwcmlOUUdiVEdZbXJ6NWVjcVhpZjBxZjk4dHMxeXp3cXNyRzdWTT06OndyZbljZxwXYx27s4IMmvE=";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Slideshow image",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this slideshow image?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Slideshow image has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Slideshow image deletion cancelled", "error");
			}
		});

	});
	
	// ============================ Register Service Category on the Website =====================================
	
	$("#addNewServiceCategoryForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#txtServiceCategoryName").val() + "###" + $("#txtServiceCategoryDescription").val() + "###" + $("#serviceCategoryRegDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoServiceCateg1";

		var tn = "ajJSU1M2L285b2dMYWFlSjJHNTBORjk2a2RTWE9UNVhvQ3pYUFFsNzN1MD06OmgvVRas1blvFPhe8cdTtU4=";
		var commandType = "insert_command";

		var objName = "Service category";
		var objPre = "SCT";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoServiceCateg1", $("#serviceCategoryPhotoSrc")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnRegServiceCategory").prop('disabled', true);
				$("#btnRegServiceCategory").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnRegServiceCategory").prop('disabled', false);
				$("#btnRegServiceCategory").html("<i class='fa fa-lg fa-save'></i> Save Category");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Fill Update Service Category -----------------------
	$(document).on("click", ".btnUpdateServiceCategory", function(e) {
		
		e.preventDefault();
			
		var objectID = $(this).attr("data-id");
		var tn = "ajJSU1M2L285b2dMYWFlSjJHNTBORjk2a2RTWE9UNVhvQ3pYUFFsNzN1MD06OmgvVRas1blvFPhe8cdTtU4=";
		var cm = "M2hqWkFLNVpMWlhkN3A0VUZ0SlNTZz09OjoXv7EqnE3PPkWPB5fyVXur";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
		
					var returned_info = Message.split("###");
					$("#txtServiceCatIddd").val(returned_info[1]);
					$("#serviceCategoryPhotoSrcTargetUp").attr("src", returned_info[5]);
					$("#photoServiceCateg1").val(returned_info[5]);
					$("#txtServiceCategoryNameUp").val(returned_info[2]);
					$("#txtServiceCategoryDescriptionUp").val(returned_info[3]);
					

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });
		
	});
	
	// ----------------------- Update Service Category Admin section ---------------------

	$("#updateServiceCategoryForm").on('submit', function (e) {
	    
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#txtServiceCatIddd").val() + "###" + $("#txtServiceCategoryNameUp").val() + "###" + $("#txtServiceCategoryDescriptionUp").val();
		var cm = "WkZCd3VVdzA5cVBrdWVIVmU4T3RDMllNWG1iaVR1UEpYR2RjOTIzSjZhbDliRnhvSzFrQTArMjRha3k3bi9vZU9Pa3E4dzdPQ0FKMWlrNzdBbnpaR3NxRVE1eWYzZGV5bytqZmM3am15aEU9OjpNSiArDos0A7zguzlCK1vw";

		var photoNames = $("#photoServiceCateg1").val();  
		var docNames = "";												//Means no documents in this update

		var hasFile = "Yes";

		var files = "photoServiceCateg1";

		var tn = "ajJSU1M2L285b2dMYWFlSjJHNTBORjk2a2RTWE9UNVhvQ3pYUFFsNzN1MD06OmgvVRas1blvFPhe8cdTtU4=";
		var commandType = "update_command";

		var objName = "Service category";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("cm", cm);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoServiceCateg1", $("#serviceCategoryPhotoSrcUp")[0].files[0]);
		formData.append("photoNames", photoNames);
		formData.append("docNames", docNames);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnUpdateServiceCategory").prop('disabled', true);
				$("#btnUpdateServiceCategory").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateServiceCategory").prop('disabled', false);
				$("#btnUpdateServiceCategory").html("<i class='fa fa-lg fa-pencil'></i> Update Category");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting Service Category on the website ---------------------
	$(document).on('click', '.btnDeleteServiceCategory', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "ajJSU1M2L285b2dMYWFlSjJHNTBORjk2a2RTWE9UNVhvQ3pYUFFsNzN1MD06OmgvVRas1blvFPhe8cdTtU4=";
		var cm = "M2hqWkFLNVpMWlhkN3A0VUZ0SlNTZz09OjoXv7EqnE3PPkWPB5fyVXur";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Service category",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this service category?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Service category has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Service category deletion cancelled", "error");
			}
		});

	});
	
	// ============================ End of Service Categories Section =================================
	
	// ============================ Register Product Category on the Website =====================================
	
	$("#addNewProductCategoryForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var vl = $("#txtProductCategoryName").val() + "###" + $("#txtProductCategoryDescription").val() + "###" + $("#productCategoryRegDate").val();

		var hasFile = "No";

		var tn = "c1JGSEp1NGxGZE5XT0lYMlpzSVJCWHRBbUkrVFBsRFh4TkNwMm9yaXdhQT06OmYwZcukZxLiZ1pQdxxn1W4=";
		var commandType = "insert_command";

		var objName = "Product category";
		var objPre = "PRC";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnRegProductCategory").prop('disabled', true);
				$("#btnRegProductCategory").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnRegProductCategory").prop('disabled', false);
				$("#btnRegProductCategory").html("<i class='fa fa-lg fa-save'></i> Register Payment");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Fill Update Service Category -----------------------
	$(document).on("click", ".btnUpdateProductCategory", function(e) {
		
		e.preventDefault();
			
		var objectID = $(this).attr("data-id");
		var tn = "c1JGSEp1NGxGZE5XT0lYMlpzSVJCWHRBbUkrVFBsRFh4TkNwMm9yaXdhQT06OmYwZcukZxLiZ1pQdxxn1W4=";
		var cm = "M2hqWkFLNVpMWlhkN3A0VUZ0SlNTZz09OjoXv7EqnE3PPkWPB5fyVXur";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
		
					var returned_info = Message.split("###");
					$("#txtProductCatIddd").val(returned_info[1]);
					$("#txtProductCategoryNameUp").val(returned_info[2]);
					$("#txtProductCategoryDescriptionUp").val(returned_info[3]);
					

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });
		
	});
	
	// ----------------------- Update Product Category Admin section ---------------------

	$("#updateProductCategoryForm").on('submit', function (e) {
	    
		e.preventDefault();
		
		var vl = $("#txtProductCatIddd").val() + "###" + $("#txtProductCategoryNameUp").val() + "###" + $("#txtProductCategoryDescriptionUp").val();
		
		var hasFile = "No";

		var tn = "c1JGSEp1NGxGZE5XT0lYMlpzSVJCWHRBbUkrVFBsRFh4TkNwMm9yaXdhQT06OmYwZcukZxLiZ1pQdxxn1W4=";
		var cm = "Z2Nla3NYTWZLeUp3dlNETktKdGpXWlpHWHQzOEJqZE9laW5ZNjhoN3ZGN0JjR3Bkd045Q05mckNWeVBkTVRiNTVGZklZZHlpTTU5OGF5RnU3a29oL1E9PTo6jL07190nS1ks0PzAmdELnQ==";
		
		var commandType = "update_command";

		var objName = "Product category";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"cm" : cm,
			"objName" : objName,
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnUpdateProductCategory").prop('disabled', true);
				$("#btnUpdateProductCategory").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateProductCategory").prop('disabled', false);
				$("#btnUpdateProductCategory").html("<i class='fa fa-lg fa-save'></i> Update Expense");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });
	   
	});
	
	// ----------------------- Deleting Service Category on the website ---------------------
	$(document).on('click', '.btnDeleteProductCategory', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "c1JGSEp1NGxGZE5XT0lYMlpzSVJCWHRBbUkrVFBsRFh4TkNwMm9yaXdhQT06OmYwZcukZxLiZ1pQdxxn1W4=";
		var cm = "M2hqWkFLNVpMWlhkN3A0VUZ0SlNTZz09OjoXv7EqnE3PPkWPB5fyVXur";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Service category",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this product category?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Product category has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Product category deletion cancelled", "error");
			}
		});

	});
	
	// ============================ End of Product Categories Section =================================
	
	
	// ============================ Register Product Purchase =========================================
	
	fillProductTypeInPurchase();
	
	$("#addNewProductPurchaseForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var vl = $("#drpProductName").val() + "###" + $("#txtProductQuantity").val() + "###" + $("#txtPurchaseReference").val() + "###" + $("#txtPurchaseDate").val();

		var hasFile = "No";

		var tn = "aDZmYklCUkY0T1Rtd2ZZN3pCL2FvSmg1c1dwMEVPV1QwQ3FoUmtPd0ZmMD06OsVawHuze0k0axa+9D3N6kA=";
		var commandType = "insert_command";

		var objName = "Product purchase";
		var objPre = "PRCH";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnRegProductPurchase").prop('disabled', true);
				$("#btnRegProductPurchase").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnRegProductPurchase").prop('disabled', false);
				$("#btnRegProductPurchase").html("<i class='fa fa-lg fa-save'></i> Register Purchase");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: "Product purchase has been registered successfully", type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting Product Purchase on the website ---------------------
	$(document).on('click', '.btnDeleteProductPurchase', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "aDZmYklCUkY0T1Rtd2ZZN3pCL2FvSmg1c1dwMEVPV1QwQ3FoUmtPd0ZmMD06OsVawHuze0k0axa+9D3N6kA=";
		var cm = "M1JIbmFsWWR4WXU2NCt2YkRkTjNuZz09OjqwTdpi/Yd1mqGB6OAzPi7e";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Product purchase",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this purchase?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Product purchase has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Product purchase deletion cancelled", "error");
			}
		});

	});
	
	// ============================ End of Product Purchase Section =================================
	
	// ============================ Register Brand on the Website =====================================

	// ----------------------- Register Brand Modal ---------------------

	$("#registerBrandForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#firstImageCaption").val() + "###" + $("#secondImageCaption").val() + "###" + $("#brandName").val() + "###" + $("#txtBrandDescription").val() + "###" + $("#brandRegisterDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoBrand1###photoBrand2";

		var tn = "R1dFbU5xQ3JTOHRNV2p5VndURlZ4UT09Ojq5CEh1EvZXeoKuOsHwp3tB";
		var commandType = "insert_command";

		var objName = "Brand";
		var objPre = "BRND";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoBrand1", $("#firstBrandPhoto")[0].files[0]);
		formData.append("photoBrand2", $("#secondBrandPhoto")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#regBrand").prop('disabled', true);
				$("#regBrand").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#regBrand").prop('disabled', false);
				$("#regBrand").html("<i class='fa fa-lg fa-save'></i> Register Brand");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Filling Data into Brand Modal ---------------------
	$(document).on("click", ".btnUpdateBranddd", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "R1dFbU5xQ3JTOHRNV2p5VndURlZ4UT09Ojq5CEh1EvZXeoKuOsHwp3tB";
		var cm = "eGsxM3hUOUZQeXhRRmJBQU9Ld2pvZz09Ojr0Ew3yV4xH3GCri2wm7Au8";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					
					$("#brandddIdddd").val(returned_info[1]);
					$("#firstImageCaptionUp").val(returned_info[2]);
					$("#secondImageCaptionUp").val(returned_info[3]);
					$("#brandNameUp").val(returned_info[4]);
					$("#txtBrandDescriptionUp").val(returned_info[5]);
					$("#firstBrandPhotoTargetUp").attr("src", returned_info[7]);
					$("#photoBrand1").val(returned_info[7]);
					$("#secondBrandPhotoTargetUp").attr("src", returned_info[8]);
					$("#photoBrand2").val(returned_info[8]);

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Update Brand Modal ---------------------
	$("#updateBrandForm").on('submit', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#brandddIdddd").val() + "###" + $("#firstImageCaptionUp").val() + "###" + $("#secondImageCaptionUp").val() + "###" + $("#brandNameUp").val() + "###" + $("#txtBrandDescriptionUp").val();
		var cm = "YTJwemhJK1E1L215THdHTzhhWjNMcTRpdyt3aEFtTEc2Q1lEOVBwY0ltTGxKbGw3MnBWenVhT014bkllcXdNZmtxR0NKNnErcnB1aHZXVkNyUTZGR0d3dzQ3V0NES2lJOFA4V2g2T2t3OERTT29vRG9TdDVsazlzU3pqdUtHdnJMZWo3NTlHekloeWVlMlN0Y0tpRzZBPT06OsYqLtMz6KL79nQujOtdjUc=";

		var photoNames = $("#photoBrand1").val() + "###" + $("#photoBrand2").val();

		var hasFile = "Yes";

		var files = "photoBrand1###photoBrand2";

		var tn = "R1dFbU5xQ3JTOHRNV2p5VndURlZ4UT09Ojq5CEh1EvZXeoKuOsHwp3tB";
		var commandType = "update_command";

		var objName = "Brand";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("cm", cm);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoBrand1", $("#firstBrandPhotoUp")[0].files[0]);
		formData.append("photoBrand2", $("#secondBrandPhotoUp")[0].files[0]);
		formData.append("photoNames", photoNames);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);


		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnUpdateBrand").prop('disabled', true);
				$("#btnUpdateBrand").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateBrand").prop('disabled', false);
				$("#btnUpdateBrand").html("<i class='fa fa-lg fa-pencil'></i> Update Brand");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting Brand Information ---------------------
	$(document).on('click', '.btnDeleteBranddd', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "eGsxM3hUOUZQeXhRRmJBQU9Ld2pvZz09Ojr0Ew3yV4xH3GCri2wm7Au8";
		var tn = "TStIeVhHaEUvSEtOU0MzZVpmUG96QT09OjoYN1/wEQvkETGQ2kuSftnd";
		var commandType = "delete_command";
		var objName = "Brand";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure?", text: "Are you sure you want to delete this brand?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Brand has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete cancelled", "Brand deletion cancelled", "");
			}
		});

	});
	
	
	// ============================ Register Staff on the Website =====================================
	
	$("#addNewStaffWebDetailsForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#txtStafffName").val() + "###" + $("#txtStafffTitle").val() + "###" + $("#stafffRegDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoStaffWeb1";

		var tn = "UnVqcU10RDN0SzVCSXlBRW5jRHNpUT09OjqWf+/iRtZZ7paPycYf8VI0";
		var commandType = "insert_command";

		var objName = "Staff web details";
		var objPre = "Staff";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoStaffWeb1", $("#staffPhotoSrc")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnRegStafff").prop('disabled', true);
				$("#btnRegStafff").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnRegStafff").prop('disabled', false);
				$("#btnRegStafff").html("<i class='fa fa-lg fa-save'></i> Save Staff");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting Staff on the website ---------------------
	$(document).on('click', '.btnDeleteStafff', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "UnVqcU10RDN0SzVCSXlBRW5jRHNpUT09OjqWf+/iRtZZ7paPycYf8VI0";
		var cm = "K1VQR29iM2Rwd0QzUFRVbkF4Q3ZkUT09OjpBupNY//cR7xv9576dsFP+";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Staff web details",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this staff web details?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Staff web details has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Staff web details deletion cancelled", "error");
			}
		});

	});
	
	// ============================ Add Customer Testmonial on the Website =====================================
	
	$("#addNewTestmonialWebForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#txtCustomWebName").val() + "###" + $("#txtCusttWebTitle").val() + "###" + $("#txtCusttWebTestmoinal").val() + "###" + $("#custtWebRegDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoCustTestmonial1";

		var tn = "cHIzV3JyVjR5ZThvV2RwclVsTXVzNGhLaVE0Y1hoZUNDREtvV1NBbjFrRT06Op2ZOPaV4IUcXiH6ZVcH/m4=";
		var commandType = "insert_command";

		var objName = "Customer testmonial";
		var objPre = "TESTMONIAL";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoCustTestmonial1", $("#customerWebSrc")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnCustWebTestmonial").prop('disabled', true);
				$("#btnCustWebTestmonial").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnCustWebTestmonial").prop('disabled', false);
				$("#btnCustWebTestmonial").html("<i class='fa fa-lg fa-save'></i> Save Testmonial");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Deleting Staff on the website ---------------------
	$(document).on('click', '.btnDeleteCustTestmonial', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "cHIzV3JyVjR5ZThvV2RwclVsTXVzNGhLaVE0Y1hoZUNDREtvV1NBbjFrRT06Op2ZOPaV4IUcXiH6ZVcH/m4=";
		var cm = "UVVRTi91RDUyNXhGMUNna3Uwb1c1Zz09OjoqyQPoq5txBswWFI47Y9xw";

		var post = {
			"action" : "ins_upd_del_everything", "vl" : vl, "cm" : cm, "tn" : tn, "commandType" : "delete_command",
			"objName" : "Customer testmonial",
		};

		swal ({
			title: "Are you sure ?", text: "Are you sure you want to delete this customer testmonial?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Customer testmonial has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete Cancelled", "Customer testmonial deletion cancelled", "error");
			}
		});

	});
	
	
	// ============================ Service Type Registartion  ===========================
		
	fillServiceCategoryName();

	// ----------------------- Register Service Modal ---------------------

	$("#registerServiceTypeForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#serviceTitle").val() + "###" + $("#servicePrice").val() + "###" + $("#serviceDuration").val() + "###" + $("#txtServiceDescription").val() + "###" + $("#serviceCategoryID").val() + "###" + $("#serviceRegisterDate").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoServ1";

		var tn = "U0ZGZUVtVDlMNGFUL0psMmpBVmthZz09OjoJj+VAyB2cK3oRFDfx3DXL";
		var commandType = "insert_command";

		var objName = "Service";
		var objPre = "SER";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoServ1", $("#servicePhoto")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#regService").prop('disabled', true);
				$("#regService").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#regService").prop('disabled', false);
				$("#regService").html("<i class='fa fa-lg fa-save'></i> Register Service");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
    // ============================== End of service type section ======================================================
    
	// ============================== Start of product type section ====================================================

	fillProductCategoryName();

	// ----------------------- Register Service Modal ---------------------
	$("#registerProductTypeForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#productTitle").val() + "###" + $("#productCategoryID").val() + "###" + $("#productPrice").val() + "###" + 20 + "###" + 10 + "###" + $("#txtProductDescription").val() + "###" + $("#productRegisterDate").val() + "###" + $("#productBarcode").val();

		//var photoNames = $("#photoEmp1").val();
		//var docNames = $("#docEmp1").val();

		var hasFile = "Yes";

		var files = "photoProduct1###photoProduct2###photoProduct3";

		var tn = "products"; //"TVRNeTljVy9VVVRIUlFhN0NDUmx0UT09Ojr5Jb52GOt7zJGPhNkw9Xm4";
		var commandType = "insert_command";

		var objName = "Product";
		var objPre = "PRDCT";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("photoProduct1", $("#productPhoto1")[0].files[0]);
		formData.append("photoProduct2", $("#productPhoto2")[0].files[0]);
		formData.append("photoProduct3", $("#productPhoto3")[0].files[0]);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);
		formData.append("objPre", objPre);
		formData.append("skipTNEncryption", true);

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#regProduct").prop('disabled', true);
				$("#regProduct").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#regProduct").prop('disabled', false);
				$("#regProduct").html("<i class='fa fa-lg fa-save'></i> Register Product");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
					    console.log('Errors::', error);
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
		 	    console.log('Caught error', e);
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Filling Data into Update Special Offer Modal ---------------------
	$(document).on("click", ".btnUpdateProductPrice", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "TVRNeTljVy9VVVRIUlFhN0NDUmx0UT09Ojr5Jb52GOt7zJGPhNkw9Xm4";
		var cm = "M3hoV3ZKY3E2S0IrRnVWVXd5cjc0QT09OjrgOWmhh0tBS0Wohf5snyrS";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					
					$("#txtProductttID").val(returned_info[1]);
					$("#txtProductttName").val(returned_info[2]);
					$("#txtProductttCurrentPrice").val(returned_info[4]);

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ==================================================================================================
	
	// ----------------------- Update Special Offer Modal ---------------------

	$("#updateProductPriceForm").on('submit', function (e) {
	    
		e.preventDefault();
		
		var vl = $("#txtProductttID").val() + "###" + $("#txtProductttNewPrice").val();
		
		var hasFile = "No";

		var tn = "TVRNeTljVy9VVVRIUlFhN0NDUmx0UT09Ojr5Jb52GOt7zJGPhNkw9Xm4";
		var cm = "ZVNJaU1GVnc5clNDT3dlRXJkZUV1MmdtZnQyOFZrZDZodTFtVmtKKzRjbz06OpfC9XxObLgwlMF7fEyYEDI=";
		
		var commandType = "update_command";

		var objName = "Product price";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"cm" : cm,
			"objName" : objName,
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnUpdateProductPrice").prop('disabled', true);
				$("#btnUpdateProductPrice").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateProductPrice").prop('disabled', false);
				$("#btnUpdateProductPrice").html("<i class='fa fa-lg fa-save'></i> Update Product Price");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });
	   
	});
	
	// ==================================================================================================
	
	// ----------------------- Deleting product type information ---------------------
	$(document).on('click', '.btnDeleteProductt', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var cm = "M3hoV3ZKY3E2S0IrRnVWVXd5cjc0QT09OjrgOWmhh0tBS0Wohf5snyrS";
		var tn = "TVRNeTljVy9VVVRIUlFhN0NDUmx0UT09Ojr5Jb52GOt7zJGPhNkw9Xm4";
		var commandType = "delete_command";
		var objName = "Product";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure?", text: "Are you sure you want to delete this product?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Product has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete cancelled", "Product deletion cancelled", "");
			}
		});

	});
	
	// ============================== End of product type section ======================================================
	
	// ============================== Search Appointments to Approve or update =========================================
	
	fillServiceTypeEveryWhere();
	$(".staffCommissionPercentage").hide();
	$(".staffCommissionAmount").hide();
	
	
	$("#custAppointDateAppointmentsFrom").prop("readonly", true);
	$("#custAppointReportDateAppointmentsTo").prop("readonly", true);

	$("#customCustAppointApptDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custAppointDateAppointmentsFrom").prop("readonly", false);
			$("#custAppointReportDateAppointmentsTo").prop("readonly", false);
		} else {
			$("#custAppointDateAppointmentsFrom").prop("readonly", true);
			$("#custAppointDateAppointmentsFrom").val("");
			$("#custAppointReportDateAppointmentsTo").prop("readonly", true);
			$("#custAppointReportDateAppointmentsTo").val("");
		}
	});
		
	$("#customerAppointmentsApptForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var service_type_id = $("#txtSelectServiceTypeAppointment").val();
		var appoint_status_type = $("#txtSelectAppointmentStatusAppointment").val();
		var str_date_appoint = $("#custAppointDateAppointmentsFrom").val();
		var end_date_appoint = $("#custAppointReportDateAppointmentsTo").val();
		
		//alert(service_type_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "search_appointments_to_approve", 
			"service_type_id": service_type_id, 
			"appoint_status_type": appoint_status_type, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnAppointmentsAppSearch").prop('disabled', true);
				$("#btnAppointmentsAppSearch").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnAppointmentsAppSearch").prop('disabled', false);
				$("#btnAppointmentsAppSearch").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#appointmentsToApproveArea").html(response);
			}
		});
	});
	
	// ----------------------- Fill Customer Appointment Approval Modal -----------------------
	$(document).on("click", ".btnApproveAppointment", function(e) {
		
		e.preventDefault();

		var appointment_id = $(this).attr("data-id");
		
		$(".modal-body").load(appointment_id);		//This is to refresh the modal after paganitaion tab change
		
		//alert(appointment_id);
		
		$.ajax({
			url: 'api/main.php',
			type: 'POST',
			data:{"action" : "fill_appointment_details_to_approve", "appointment_id" : appointment_id},
			dataType:"JSON",
			success: function(data) {
			    
		    	var Message = data.Message;
    			var status = data.Status;
    			
    			if (status == true) {
    				
    				if (Message == "No information found") {
    				    
                        // No information found

                    } else {
    
    					var returned_info = Message.split("###");
    					
    					$("#appointtIddd").val(returned_info[0]);
    					$("#custommIddd").val(returned_info[1]);
    					$("#custtName").val(returned_info[2]);
    					$("#serviceTypeIdd").val(returned_info[3]);
    					$("#serviceImagee").attr("src", returned_info[4]);
    					$("#servi_categ_id").val(returned_info[5]);
    					$("#txtServiceTypee").val(returned_info[6]);
    					$("#txtServicePricee").val(returned_info[7]);
    					$("#txtServiceDurationn").val(returned_info[8]);
    					$("#drpAppointDatee").val(returned_info[9].substr(0, 10));
    					$("#txtTCommissionAmount").val(returned_info[13]);
    					$("#txtCommissionPercentage").val(returned_info[14]);
    					
    					var service_dur = parseInt(returned_info[8]);

						var startTime = 600;
						
						while (startTime <= 1080) {
							
							var new_ser_hour = (startTime/60).toFixed(0);
							var new_ser_minute = startTime%60;
							if (new_ser_minute === 0) { new_ser_minute = "00"; } else { new_ser_minute = new_ser_minute }
							var unite_hour_minute = new_ser_hour + ":" + new_ser_minute;
							
							$('#drpAppointTimee').append('<option value="' + unite_hour_minute + '">' + unite_hour_minute + '</option>');

							startTime += service_dur;
						}
								
    					$("#drpAppointTimee").val(returned_info[9].substr(11));
    					
    					$('#drpSelectStaffAppointmenttt').append('<option value="">' + returned_info[10] + '</option>');
    					
    					$("#txtAppointmentStatuss").val(returned_info[12]);



    				}
    			
    			}	

			}
		});
	});
	
	// ------------ Fill staff name when is appointment date and time is chosen admin section
	$("#drpAppointTimee").on("change", function () {

		var custoo_idd = $("#custommIddd").val();
		var servicee_category = $("#servi_categ_id").val();
		var appoint_date_time = $("#drpAppointDatee").val() + " " + $(this).val();
		
		//alert(appoint_date_time);
		
		var post = {
			"action": "fill_staff_in_appointment_admin",
			"custoo_idd": custoo_idd,
			"servic_catego": servicee_category,
			"app_date_time" : appoint_date_time
		}

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				
				if (status == true) {
					
					var options = "";
					if (Message == "No information found") {
						options += "<option selected disabled value=''>---- Select Staff ----</option>";
					} else {
						var returned_info = Message.split("###");
						options += "<option selected value=''>---- Select Staff ----</option>";
						for (var i=0; i<=returned_info.length - 1; i++) {
							var row = returned_info[i].split("***");
							options += "<option value='" + row[i,1] + "'>" + row[i,2] + " (" + row[i,18] + ") </option>";
						}
					}
					
					$("#drpSelectStaffAppointmenttt").html(options);
					//Remove duplicate options in the select
					$("#drpSelectStaffAppointmenttt option").each(function() {
                          $(this).siblings('[value="'+ this.value +'"]').remove();
                        });
					
				} else {
				    $('#drpSelectStaffAppointmenttt')
        			.empty()
        			.append('<option selected value="">---- Select Staff ----</option>');
        			
				    swal("No Staff Available", Message, "");
				}
			}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
		});

	});
	
	$("#drpSelectStaffAppointmenttt").on("change", function () {
	    $(".staffCommissionPercentage").show();
	    $(".staffCommissionAmount").show();
	});
	
	$("#txtCommissionPercentage").on("keyup", function () {
	    var service_pricee = parseFloat($("#txtServicePricee").val());
	    var comm_perc = parseFloat($(this).val()) / 100;
	    
	    if ($(this).val() === "") {
	        $("#txtCommissionAmount").val(0);
	    } else {
            $("#txtCommissionAmount").val((service_pricee*comm_perc).toFixed(2));
	    }
	});
	
	
	
	// ----------------------- Update and Approve Customer Appointment -------------------------

	$("#approveAppointmentAdminForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var epppoint_id = $("#appointtIddd").val();
		var emmploye_id = $("#drpSelectStaffAppointmenttt").val();
		var cutttomm_id = $("#custommIddd").val();
		var servvice_id = $("#serviceTypeIdd").val();
		var apt_date_time = $("#drpAppointDatee").val() + " " + $("#drpAppointTimee").val() ;
		var appt_stts = $("#txtAppointmentStatuss").val();
		var staff_commision = $("#txtCommissionAmount").val();
		var staff_comm_percent = $("#txtCommissionPercentage").val();
		
		var post = {
			"action" : "update_and_approve_appointment_admin",
			"epppoint_id" : epppoint_id,
			"emmploye_id" : emmploye_id,
			"servvice_id" : servvice_id,
			"cutttomm_id" : cutttomm_id,
			"apt_date_time" : apt_date_time,
			"staff_commision" : staff_commision,
			"appt_stts" : appt_stts,
			"comm_percent" : staff_comm_percent
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnUpdateAppointmentAdmin").prop('disabled', true);
				$("#btnUpdateAppointmentAdmin").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
			    console.log('DATA:::', data);
				$("#btnUpdateAppointmentAdmin").prop('disabled', false);
				$("#btnUpdateAppointmentAdmin").html("<i class='fa fa-lg fa-pencil'></i> Update Appointment");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
		 	    console.log('Error::', e);
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ============================== Staff Appointments (My Appointments) =========================================
	
	$("#custAppointDateStaffAppointmentsFrom").prop("readonly", true);
	$("#custAppointReportDateStaffAppointmentsTo").prop("readonly", true);

	$("#customCustAppointStaffApptDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custAppointDateStaffAppointmentsFrom").prop("readonly", false);
			$("#custAppointReportDateStaffAppointmentsTo").prop("readonly", false);
		} else {
			$("#custAppointDateStaffAppointmentsFrom").prop("readonly", true);
			$("#custAppointDateStaffAppointmentsFrom").val("");
			$("#custAppointReportDateStaffAppointmentsTo").prop("readonly", true);
			$("#custAppointReportDateStaffAppointmentsTo").val("");
		}
	});
		
	$("#staffAppointmentsForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var service_type_id = $("#txtSelectServiceTypeStaffAppointment").val();
		var appoint_status_type = $("#txtSelectAppointmentStatusStaffAppointment").val();
		var str_date_appoint = $("#custAppointDateStaffAppointmentsFrom").val();
		var end_date_appoint = $("#custAppointReportDateStaffAppointmentsTo").val();
		
		//alert(service_type_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "search_my_appointments_staff", 
			"service_type_id": service_type_id, 
			"appoint_status_type": appoint_status_type, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnAppointmentsStaffAppSearch").prop('disabled', true);
				$("#btnAppointmentsStaffAppSearch").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnAppointmentsStaffAppSearch").prop('disabled', false);
				$("#btnAppointmentsStaffAppSearch").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#staffAppointmentsArea").html(response);
			}
		});
	});
	
	// ----------------------- Fill Staff Appointment (My Appointment) Modal -----------------------
	$(document).on("click", ".btnUpdateStaffAppointment", function(e) {
		
		e.preventDefault();

		var appointment_id = $(this).attr("data-id");
		
		$(".modal-body").load(appointment_id);		//This is to refresh the modal after paganitaion tab change
		
		$.ajax({
			url: 'api/main.php',
			type: 'POST',
			data:{"action" : "fill_appointment_details_to_approve_staff", "appointment_id" : appointment_id},
			dataType:"JSON",
			success: function(data) {
			    
		    	var Message = data.Message;
    			var status = data.Status;
    			
    			if (status == true) {
    				
    				if (Message == "No information found") {
    				    
                        // No information found

                    } else {
    
    					var returned_info = Message.split("###");
    					
    					$("#appnttIddd").val(returned_info[0]);
    					$("#cuustommIddd").val(returned_info[1]);
    					$("#custtomName").val(returned_info[2]);
    					$("#serviceImageeStaffApp").attr("src", returned_info[4]);
    					$("#txtServiceeTyppee").val(returned_info[6]);
    					$("#txtServiceDuratiionn").val(returned_info[8]);
    					$("#drpAppointttDatee").val(returned_info[9].substr(0, 10));
    					$("#drpAppointTimmmee").val(returned_info[9].substr(11));
    					$("#txtAppointmentStatussss").select2().val(returned_info[12]).trigger('change');
    					$("#txtCommissionAmount").val(returned_info[13]);
    					$("#txtCommissionPercentage").val(returned_info[14]);
    					$("#txtBalanceDueCustPaymentApp").val(returned_info[7]);
    					
    				}
    			
    			}	

			}
		});
	});
	
	

  // -------- show or hide payment form
  $("#txtAppointmentStatussss").change(function() {
	var value = this.value;

	if(value === "Completed") {
		$("#addPaymentSection").show();
	} else {
		$("#addPaymentSection").hide();
	}
  });
	
	
	// ----------------------- Complete or Miss Staff Appointments (My Appointments) Modal -------------------------

	$("#staffAppointmentMyApptForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var staff_apppointment_id = $("#appnttIddd").val();
		var apppointment_status = $("#txtAppointmentStatussss").val();

		var post = {
			"action" : "update_and_approve_staff_appointment",
			"staff_apppointment_id" : staff_apppointment_id,
			"apppointment_status" : apppointment_status
		};
		
		var shouldAddPayment = apppointment_status === "Completed";

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnUpdateStaffAppointmentttAdmin").prop('disabled', true);
				$("#btnUpdateStaffAppointmentttAdmin").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateStaffAppointmentttAdmin").prop('disabled', false);
				$("#btnUpdateStaffAppointmentttAdmin").html("<i class='fa fa-lg fa-pencil'></i> Update Appointment");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {
				    if (shouldAddPayment) {
				        // Add Payment for appointment
				        console.log('======== Will start payment =======');
				        var vl_payment =
                          $("#cuustommIddd").val() +
                          "###" +
                          "0" +
                          "###" +
                          $("#txtPaidAmountCustPaymentApp").val() +
                          "###" +
                          $("#txtDiscountCustPaymentApp").val() +
                          "###" +
                          $("#txtPaymentTypeCustPaymentApp").val() +
                          "###" +
                          $("#txtServiceeTyppee").val() +
                          "###" +
                          $("#custPaymentRegisterDateApp").val();
                    
                        var hasFile_payment = "No";

                    var tn_payment =
                      "UXloK1BFZ1pWM0VJWGFaZHlQVnhWVFJ2Z09YT0xXUCtPNlhPSnJoSThlQT06Ov1zKrxvhIk+z53QpUXQFQc=";
                    var commandType_payment = "insert_command";
                
                    var objName_payment = "Customer payment";
                    var objPre_payment = "PAY";
                
                    var post_payment = {
                      action: "ins_upd_del_everything",
                      vl: vl_payment,
                      hasFile: hasFile_payment,
                      commandType: commandType_payment,
                      tn: tn_payment,
                      objName: objName_payment,
                      objPre: objPre_payment,
                    };

                    $.ajax({
                      url: "api/main.php",
                      type: "POST",
                      data: post_payment,
                      dataType: "JSON",
                      success: function (data) {
                        
                        var Message = data.Message;
                        var status = data.Status;
                        if (status == true) {
                          swal(
                            {
                              title: "",
                              text: "Appointment updates successfully.",
                              type: "success",
                              showCancelButton: false,
                              closeOnConfirm: false,
                              closeOnCancel: false,
                            },
                            function (isConfirm) {
                              if (isConfirm) {
                                location.reload();
                              }
                            }
                          );
                        } else {
                          Message.forEach(function (error) {
                            bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {
                              type: "danger",
                              position: "topright",
                              appendType: "append",
                            });
                          });
                        }
                      },
                      error: function (e) {
                        bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {
                          type: "danger",
                          position: "topright",
                          appendType: "append",
                        });
                      },
                    });
				    } else {
				        swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					        }, function(isConfirm) {
						        if (isConfirm) { location.reload(); }
					    });   
				    }
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	
	// ============================= Start of Customer Payment ==========================================
    
    $(document).on("change", "#txtCustomerNameCustPayment", function () {
        
        var selected_customer = $(this).val();

		if (selected_customer === "") {
			$("#registerCustomerPaymentForm")[0].reset();
		} else {

			//Fetch the due balance of the customer
			$.ajax({
				method: "POST",
				url : "api/main.php",
				data: {"action" : "calculate_customer_dept" , "selected_customer" : selected_customer},
				dataType: "JSON",
				success : function(data){
					var Message = data.Message;
					var status = data.Status;
					if(status == true){
					    
					    if (status === true) {
    						$("#txtBalanceDueCustPayment").val(parseInt(Message));
    						$("#txtRemainingCustPayment").val(parseInt(Message));
					    } else {
							$("#txtBalanceDueCustPayment").val(parseInt(0));
    						$("#txtRemainingCustPayment").val(parseInt(0));
					    }
						
					}
				},
				error : function(data){

				}
			})
		}
		
    });
    
    $(document).on("keyup", "#txtPaidAmountCustPayment", function () {
        
        var cust_paid_amount = parseInt($(this).val());
        var cust_dept_amount = parseInt($("#txtBalanceDueCustPayment").val());
        var descount_amountt = parseInt($("#txtDiscountCustPayment").val());
        
        if (cust_paid_amount === "" && descount_amountt === "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount);
        } else if (cust_paid_amount === "" && descount_amountt != "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount - descount_amountt);
        } else if (cust_paid_amount != "" && descount_amountt === "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount - cust_paid_amount);
        } else {
            $("#txtRemainingCustPayment").val(cust_dept_amount - (cust_paid_amount + descount_amountt));
        }
        
    });
    
    $(document).on("keyup", "#txtDiscountCustPayment", function () {
        
        var cust_paid_amount = parseInt($("#txtPaidAmountCustPayment").val());
        var cust_dept_amount = parseInt($("#txtBalanceDueCustPayment").val());
        var descount_amountt = parseInt($(this).val());
        
        if (cust_paid_amount === "" && descount_amountt === "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount);
        } else if (cust_paid_amount === "" && descount_amountt != "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount - descount_amountt);
        } else if (cust_paid_amount != "" && descount_amountt === "") {
            $("#txtRemainingCustPayment").val(cust_dept_amount - cust_paid_amount);
        } else {
            $("#txtRemainingCustPayment").val(cust_dept_amount - (cust_paid_amount + descount_amountt));
        }
        
    });
    
    // ----------------------- Register Customer Payment Modal ---------------------

	$("#registerCustomerPaymentForm").on('submit', function (e) {
		
		e.preventDefault();

		var vl = $("#txtCustomerNameCustPayment").val() + "###" + "0" + "###" + $("#txtPaidAmountCustPayment").val() + "###" + $("#txtDiscountCustPayment").val() + "###" + $("#txtPaymentTypeCustPayment").val() + "###" + $("#txtDescriptionCustPayment").val() + "###" + $("#custPaymentRegisterDate").val();
		
		var hasFile = "No";

		var tn = "UXloK1BFZ1pWM0VJWGFaZHlQVnhWVFJ2Z09YT0xXUCtPNlhPSnJoSThlQT06Ov1zKrxvhIk+z53QpUXQFQc=";
		var commandType = "insert_command";

		var objName = "Customer payment";
		var objPre = "PAY";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#regCustomerPayment").prop('disabled', true);
				$("#regCustomerPayment").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#regCustomerPayment").prop('disabled', false);
				$("#regCustomerPayment").html("<i class='fa fa-lg fa-save'></i> Register Payment");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});

	// ============================= End of Customer Payment ============================================
	
	// ----------------------- Filling Data into Update Price List Document Modal ---------------------
	$(document).on("click", ".btnUpdatePriceList", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "Q2ZidmZiZysrVHF3eGo3UUs2OG5tdz09OjqydyBF4fuSRBYweWg22VcF";
		var cm = "clMyVG5zTU8wM2RvVUpEUUJEOGVpUT09OjpjCVJHuJxsUNLzqG5Amxia";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					
					$("#txtPriceListDocumentID").val(returned_info[1]);
					$("#docPriceList").val(returned_info[3]);

				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ----------------------- Update Price List Document Modal ---------------------
	$("#updatePriceListDocumentForm").on('submit', function (e) {
		e.preventDefault();
		
		var formData = new FormData(this);

		var vl = $("#txtPriceListDocumentID").val() + "###" + $("#updatePriceListDocumentDate").val();
		var cm = "dFByaEM2S0FvcEpMTU9VczB0RXFjWWpYMTkwQlZDR2NKSnZobmk2MG9JaTlzUGhPcVJRTnJFRlo5MFdJc28ybzo6wiU5TBm+E1F9Z2l99NMkig==";

		var docNames = $("#docPriceList").val() + "###" + $("#photoBrand2").val();

		var hasFile = "Yes";

		var files = "docPriceList";

		var tn = "Q2ZidmZiZysrVHF3eGo3UUs2OG5tdz09OjqydyBF4fuSRBYweWg22VcF";
		var commandType = "update_command";

		var objName = "Price list document";

		formData.append("action", "ins_upd_del_everything");
		formData.append("vl", vl);
		formData.append("cm", cm);
		formData.append("hasFile", hasFile);
		formData.append("files", files);
		formData.append("docPriceList", $("#priceListDocument")[0].files[0]);
		formData.append("docNames", docNames);
		formData.append("commandType", commandType);
		formData.append("tn", tn);
		formData.append("objName", objName);


		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  formData,
			contentType: false,
			cache: false,
			processData:false,
			beforeSend:function(){
				$("#btnUpdatePriceListDocument").prop('disabled', true);
				$("#btnUpdatePriceListDocument").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdatePriceListDocument").prop('disabled', false);
				$("#btnUpdatePriceListDocument").html("<i class='fa fa-lg fa-pencil'></i> Update Price List");
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ==================================================================================================
	
	// ============================= Start of Special Offers ============================================
	
	// ------------ Fill service or products when offer type is chosen admin section
	$("#drpOfferType").on("change", function () {

		var offfer_type = $(this).val();
		
		if (offfer_type === "") {
		    $("#drpServiceProductType").val("");
		    $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
		} else if (offfer_type === "Service") {
		    $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
		    fillServiceTypeSpecialOffers();
		} else {
		    $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
		    fillProductTypeSpecialOffers();
		}

	});
	
	// ------------ Fill service or products information when selected
	$("#drpServiceProductType").on("change", function () {

		var offeer_type = $("#drpOfferType").val();
		var serv_prod_id = $(this).val();
		
        if (offeer_type === "") {
            $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
        } else if (offeer_type === "Service") {
            $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
		    fillServiceTypeInformationSpecialOffers();
		} else if (offeer_type === "Product") {
		    $("#txtCurrenttPrice").val("");
		    $("#txtOffferPercentage").val("");
		    $("#txtNewwPrice").val("");
		    $("#txtOfferStartDate").val("");
		    $("#txtOfferStartTime").val("");
		    $("#txtOfferEndDate").val("");
		    $("#txtOfferEndTime").val("");
		    fillProductTypeInformationSpecialOffers();
		}

	});
	
	// ------------ Calculate offer percentage
	$("#txtOffferPercentage").on("keyup", function () {

		var curr_price = $("#txtCurrenttPrice").val();
		var perc_val = $(this).val();
		
        if (perc_val === "") {
		    $("#txtNewwPrice").val(curr_price);
		} else {
		    $("#txtNewwPrice").val(Math.round((curr_price - (curr_price * (perc_val/100) * 100)/100)));
		}

	});
	
	// ====================================== Register Special Offer  ===========================================
	
	$("#registerSpecialOfferForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var vl = $("#drpOfferType").val() + "###" + $("#drpServiceProductType").val() + "###" + $("#txtCurrenttPrice").val() + "###" + $("#txtOffferPercentage").val() + "###" + $("#txtNewwPrice").val() + "###" + $("#txtOfferStartDate").val() + " " + $("#txtOfferStartTime").val() + "###" + $("#txtOfferEndDate").val() + " " + $("#txtOfferEndTime").val() + "###" + $("#offerRegDate").val();

		var hasFile = "No";

		var tn = "YitnQjRVRmxWK09BOTVpR0lja2VoZz09Ojo7N8fRH2vEs0hgHF5W5c2h";
		var commandType = "insert_command";

		var objName = "Special offer";
		var objPre = "SPOF";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"objName" : objName,
			"objPre" : objPre
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnRegisterSpecialOffer").prop('disabled', true);
				$("#btnRegisterSpecialOffer").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnRegisterSpecialOffer").prop('disabled', false);
				$("#btnRegisterSpecialOffer").html("<i class='fa fa-lg fa-save'></i> Register Payment");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
    // ===============================================================================================================
	
	// ----------------------- Filling Data into Update Special Offer Modal ---------------------
	$(document).on("click", ".btnUpdateSpecialOffer", function (e) {
		e.preventDefault();

		var objectID = $(this).attr("data-id");
		var tn = "RUxnMDV4NUxPeU9VL0Zyb0dhMGFDdz09Ojq4pKJiuHT06AUcXvBk5rjz";
		var cm = "YmxaK2psaTE1SHpqNVVTTWtiNmwzdz09OjrUSM60c4fvBWJsLTRBTVub";

		var post = {
			"action": "fetch_parameterized_everything",
			"dn": dn,
			"tn" : tn,
			"cm" : cm,
			"objectID": objectID
		}

		$(".modal-body").load(objectID);

		$.ajax({
			method: "POST",
			url: "api/main.php",
			data:  post,
			dataType: "JSON",
			success: function(data) {
				var Message = data.Message;
				var status = data.Status;
				if (status === true) {
				
					var returned_info = Message.split("###");
					
					$("#txtOffeerrIDUp").val(returned_info[1]);
					$("#txtCurrenttPriceUp").val(returned_info[4]);
					$("#txtOffferPercentageUp").val(returned_info[5]);
					$("#txtNewwPriceUp").val(returned_info[6]);
					$("#txtOfferStartDateUp").val(returned_info[7].substr(0, 10));
					$("#txtOfferStartTimeUp").val(returned_info[7].substr(returned_info[7].length - 5));
					$("#txtOfferEndDateUp").val(returned_info[8].substr(0, 10));
					$("#txtOfferEndTimeUp").val(returned_info[8].substr(returned_info[8].length - 5));
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });

	});
	
	// ==================================================================================================
	
	// ------------ Calculate offer percentage update modal
	$("#txtOffferPercentageUp").on("keyup", function () {

		var curr_price = $("#txtCurrenttPriceUp").val();
		var perc_val = $(this).val();
		
        if (perc_val === "") {
		    $("#txtNewwPriceUp").val(curr_price);
		} else {
		    $("#txtNewwPriceUp").val(Math.round((curr_price - (curr_price * (perc_val/100) * 100)/100)));
		}

	});
	
	// ----------------------- Update Special Offer Modal ---------------------

	$("#updateSpecialOfferForm").on('submit', function (e) {
	    
		e.preventDefault();
		
		var vl = $("#txtOffeerrIDUp").val() + "###" + $("#txtCurrenttPriceUp").val() + "###" + $("#txtOffferPercentageUp").val() + "###" + $("#txtNewwPriceUp").val() + "###" + $("#txtOfferStartDateUp").val() + " " + $("#txtOfferStartTimeUp").val() + "###" + $("#txtOfferEndDateUp").val() + " " + $("#txtOfferEndTimeUp").val();

		var hasFile = "No";

		var tn = "RUxnMDV4NUxPeU9VL0Zyb0dhMGFDdz09Ojq4pKJiuHT06AUcXvBk5rjz";
		var cm = "WmRQYkg2enJXNWl5NGJsNUtxVnFidVRsa3Z0NmtwdzF4cmg1bDBocDBxMjZCUC8weUtNd3hpaUhoQ3YwRzZHRERvNXVXM0Y0NDg5Yks4c2FrNVpkUElmaDNFS29EVDRkVk5jWlp2NWNYSWVleUdhbS9MM2pxZ3JxeXBjb3JPSU86OrpVWoREhE/d+8xMH6NCzRI=";
		
		var commandType = "update_command";

		var objName = "Special offer";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"hasFile" : hasFile,
			"commandType" : commandType,
			"tn" : tn,
			"cm" : cm,
			"objName" : objName,
		};

		$.ajax({
			url: "api/main.php",
			type: "POST",
			data:  post,
			dataType: "JSON",
			beforeSend:function(){
				$("#btnUpdateSpecialOffer").prop('disabled', true);
				$("#btnUpdateSpecialOffer").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function(data) {
				$("#btnUpdateSpecialOffer").prop('disabled', false);
				$("#btnUpdateSpecialOffer").html("<i class='fa fa-lg fa-save'></i> Update Special Offer");
				var Message = data.Message;
				var status = data.Status;
				if (status == true) {		
					swal ({
						title: "", text: Message, type: "success", showCancelButton: false, closeOnConfirm: false, closeOnCancel: false
					}, function(isConfirm) {
						if (isConfirm) { location.reload(); }
					});
				} else {
					Message.forEach(function (error) {
						bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + error, {type: "danger", position: "topright", appendType: "append"});
					});
				}	
		 	}, error: function(e) {
				bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
			}          
	   });
	   
	});
	
	// ----------------------- Deleting special offer ---------------------
	$(document).on('click', '.btnDeleteSpecialOffer', function(e){
		e.preventDefault();

		const deleteBtnID = $(this).attr("id");
		var vl = $(this).attr("data-id");
		var tn = "RUxnMDV4NUxPeU9VL0Zyb0dhMGFDdz09Ojq4pKJiuHT06AUcXvBk5rjz";
		var cm = "YmxaK2psaTE1SHpqNVVTTWtiNmwzdz09OjrUSM60c4fvBWJsLTRBTVub";
		var commandType = "delete_command";
		var objName = "Special offer";

		var post = {
			"action" : "ins_upd_del_everything",
			"vl" : vl,
			"cm" : cm,
			"tn" : tn,
			"commandType" : commandType,
			"objName" : objName,
		};

		swal ({
			title: "Are you sure?", text: "Are you sure you want to delete this special offer?", showCancelButton: true, confirmButtonText: "Yes, delete!", cancelButtonText: "No, don't delete!",
			closeOnConfirm: false,
			closeOnCancel: false
		}, function(isConfirm) {
			if (isConfirm) {
			    
			    $.ajax({    
					method: "POST", url : "api/main.php", data: post, dataType: "JSON",
					success : function(data){
						var Message = data.Message;
						var status = data.Status;
						if (status == true) {
							swal("", "Special offer has been deleted successfully", "success");
							$("#" + deleteBtnID).parents("tr").remove();
                        } else {
                            swal("", Message, "error");
                        }
					},
					error : function(data){ }
				})
			} else {
				swal("Delete cancelled", "Special offer deletion cancelled", "");
			}
		});

	});
	
	// ==================================================================================================
	
	// ============================= Start of System Special Reports ====================================
	
	fillStaffNameEveryWhere();
	fillCustomerNameEveryWhere();
	
	// ============================= Individual and Group Customers Report ==============================

	$("#customCustomersReportDate").prop("checked", true);
	$("#customersReportStartFrom").prop("readonly", true);
	$("#customersReportEndTo").prop("readonly", true);
	
	$("#customCustomersReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#customersReportStartFrom").prop("readonly", true);
			$("#customersReportStartFrom").val("");
			$("#customersReportEndTo").prop("readonly", true);
			$("#customersReportEndTo").val("");
			$("#custNameCustomersReport").prop("disabled", false);
		} else {
			$("#customersReportStartFrom").prop("readonly", false);
			$("#customersReportEndTo").prop("readonly", false);
			$("#custNameCustomersReport").prop("disabled", true);
		}
	});
	
	$("#custNameCustomersReport").on('change', function () {
		if ($(this).val() != "") {
			$("#customersReportStartFrom").prop("readonly", true);
			$("#customersReportStartFrom").val("");
			$("#customersReportEndTo").prop("readonly", true);
			$("#customersReportEndTo").val("");
		} else {
			// Do nothing
		}
	});
	
	$("#customersReportForm").on('submit', function (e) {
		e.preventDefault();
		var custInfoCustReport = $("#custNameCustomersReport").val();
		var strDateCustReport = $("#customersReportStartFrom").val();
		var endTooCustReport = $("#customersReportEndTo").val();
		
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: {
				"action": "customersReport", 
				custInfoCustReport:custInfoCustReport, 
				strDateCustReport:strDateCustReport, 
				endTooCustReport:endTooCustReport
			},
			dataType: "text",
			beforeSend:function(){
				$("#btnCustomersReport").prop('disabled', true);
				$("#btnCustomersReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnCustomersReport").prop('disabled', false);
				$("#btnCustomersReport").html("<i class='fa fa-lg fa-search'></i> Search");
				$("#custReportSection").html(response);
			}
		});
	});
	
	$(document).on('click', '#printCustomersReport', function(){
		//Display and open the print dialog box to print the report
		var empReportRestorePage = document.body.innerHTML;
		var empReportPrintArea = document.getElementById("customersReportPrintArea").innerHTML;
		document.body.innerHTML = empReportPrintArea;
		window.print();
		document.body.innerHTML = empReportRestorePage;	
	});

	// ============================== Appointments By Staff Report ======================================
	
	$("#custAppointByStaffAppReportFrom").prop("readonly", true);
	$("#custAppointByStaffAppReportTo").prop("readonly", true);

	$("#customByStaffAppReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custAppointByStaffAppReportFrom").prop("readonly", false);
			$("#custAppointByStaffAppReportTo").prop("readonly", false);
		} else {
			$("#custAppointByStaffAppReportFrom").prop("readonly", true);
			$("#custAppointByStaffAppReportFrom").val("");
			$("#custAppointByStaffAppReportTo").prop("readonly", true);
			$("#custAppointByStaffAppReportTo").val("");
		}
	});
		
	$("#byStaffAppointmentReportForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var staff_app_id = $("#txtSelectStaffByStaffAppReport").val();
		var appoint_status_type = $("#txtSelectStatusByStaffAppReport").val();
		var str_date_appoint = $("#custAppointByStaffAppReportFrom").val();
		var end_date_appoint = $("#custAppointByStaffAppReportTo").val();
		
		//alert(staff_app_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "appointment_by_sttaff_report", 
			"staff_app_id": staff_app_id, 
			"appoint_status_type": appoint_status_type, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnByStaffAppReportSearch").prop('disabled', true);
				$("#btnByStaffAppReportSearch").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnByStaffAppReportSearch").prop('disabled', false);
				$("#btnByStaffAppReportSearch").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#custAppointsByStaffReportSection").html(response);
			}
			
		});
		
	});
	
	$(document).on("click", "#printByStaffApptReport", function(){
		//Display and open the print dialog box to print the report
		var appoints_report_restore_page = document.body.innerHTML;
		var appoints_report_print_area = document.getElementById("byStaffApptPrintArea").innerHTML;
		document.body.innerHTML = appoints_report_print_area;
		window.print();
		document.body.innerHTML = appoints_report_restore_page;
		
	});
	
	// ============================== Appointments By Customer Report ======================================
	
	$("#custAppointByCustomerAppReportFrom").prop("readonly", true);
	$("#custAppointByCustomerAppReportTo").prop("readonly", true);

	$("#customByCustomerAppReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custAppointByCustomerAppReportFrom").prop("readonly", false);
			$("#custAppointByCustomerAppReportTo").prop("readonly", false);
		} else {
			$("#custAppointByCustomerAppReportFrom").prop("readonly", true);
			$("#custAppointByCustomerAppReportFrom").val("");
			$("#custAppointByCustomerAppReportTo").prop("readonly", true);
			$("#custAppointByCustomerAppReportTo").val("");
		}
	});
		
	$("#byCustomerAppointmentReportForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var customer_app_id = $("#txtSelectCustomerByCustomerAppReport").val();
		var appoint_status_type = $("#txtSelectStatusByCustomerAppReport").val();
		var str_date_appoint = $("#custAppointByCustomerAppReportFrom").val();
		var end_date_appoint = $("#custAppointByCustomerAppReportTo").val();
		
		//alert(Customer_app_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "appointment_by_customer_report", 
			"customer_app_id": customer_app_id, 
			"appoint_status_type": appoint_status_type, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnByCustomerAppReportSearch").prop('disabled', true);
				$("#btnByCustomerAppReportSearch").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnByCustomerAppReportSearch").prop('disabled', false);
				$("#btnByCustomerAppReportSearch").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#custAppointsByCustomerReportSection").html(response);
			}
			
		});
		
	});
	
	$(document).on("click", "#printByCustomerApptReport", function(){
		//Display and open the print dialog box to print the report
		var appoints_report_restore_page = document.body.innerHTML;
		var appoints_report_print_area = document.getElementById("byCustomerApptPrintArea").innerHTML;
		document.body.innerHTML = appoints_report_print_area;
		window.print();
		document.body.innerHTML = appoints_report_restore_page;
		
	});
	
	// ============================== Appointments By Service Report ======================================
	
	$("#custAppointByServiceAppReportFrom").prop("readonly", true);
	$("#custAppointByServiceAppReportTo").prop("readonly", true);

	$("#customByServiceAppReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custAppointByServiceAppReportFrom").prop("readonly", false);
			$("#custAppointByServiceAppReportTo").prop("readonly", false);
		} else {
			$("#custAppointByServiceAppReportFrom").prop("readonly", true);
			$("#custAppointByServiceAppReportFrom").val("");
			$("#custAppointByServiceAppReportTo").prop("readonly", true);
			$("#custAppointByServiceAppReportTo").val("");
		}
	});
		
	$("#byServiceAppointmentReportForm").on('submit', function (e) {
		
		e.preventDefault();
		
		var service_app_id = $("#txtSelectCustomerByServiceAppReport").val();
		var appoint_status_type = $("#txtSelectStatusByServiceAppReport").val();
		var str_date_appoint = $("#custAppointByServiceAppReportFrom").val();
		var end_date_appoint = $("#custAppointByServiceAppReportTo").val();
		
		//alert(Customer_app_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "appointment_by_service_report", 
			"service_app_id": service_app_id, 
			"appoint_status_type": appoint_status_type, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnByServiceAppReportSearch").prop('disabled', true);
				$("#btnByServiceAppReportSearch").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnByServiceAppReportSearch").prop('disabled', false);
				$("#btnByServiceAppReportSearch").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#custAppointsByServiceReportSection").html(response);
			}
			
		});
		
	});
	
	$(document).on("click", "#printByServiceApptReport", function(){
		//Display and open the print dialog box to print the report
		var appoints_report_restore_page = document.body.innerHTML;
		var appoints_report_print_area = document.getElementById("byServiceApptPrintArea").innerHTML;
		document.body.innerHTML = appoints_report_print_area;
		window.print();
		document.body.innerHTML = appoints_report_restore_page;
		
	});
	
	// ---------------------------- Customer Payments Group Report ------------------	

	$("#custPayReportDateFrom").prop("readonly", true);
	$("#custPayReportDateTo").prop("readonly", true);

	$("#customCustPayReportDate").on('change', function () {
		if ($(this).is(':checked')) {
			$("#custPayReportDateFrom").prop("readonly", false);
			$("#custPayReportDateTo").prop("readonly", false);
		} else {
			$("#custPayReportDateFrom").prop("readonly", true);
			$("#custPayReportDateFrom").val("");
			$("#custPayReportDateTo").prop("readonly", true);
			$("#custPayReportDateTo").val("");
		}
	});
	
	$(document).on("submit", "#customerPaymentReportForm", function (e) {
		
		e.preventDefault();
		
	    var customer_app_id = $("#customerNameCustPayReport").val();
		var str_date_appoint = $("#custPayReportDateFrom").val();
		var end_date_appoint = $("#custPayReportDateTo").val();
		
		//alert(Customer_app_id + " == " + appoint_status_type + " == " + str_date_appoint + " == " + end_date_appoint);
		
		var post = {
			"action": "customer_payments_report", 
			"customer_app_id": customer_app_id, 
			"str_date_appoint": str_date_appoint, 
			"end_date_appoint": end_date_appoint
		}
	
		$.ajax({
			type: "POST",
			url: "api/main.php",
			data: post,
			dataType: "text",
			beforeSend:function(){
				$("#btnSearchCustPayReport").prop('disabled', true);
				$("#btnSearchCustPayReport").html("<i class='fa fa-lg fa-spinner fa-pulse'></i> Please wait");
			},
			success: function (response) {
				$("#btnSearchCustPayReport").prop('disabled', false);
				$("#btnSearchCustPayReport").html("<i class='fa fa-lg fa-search'></i>Search");
				$("#customerPaymentsReportSection").html(response);
			}
			
		});
		
	});
	
	$(document).on("click", "#printCustPayReport", function(){
		//Display and open the print dialog box to print the report
		var cust_paym_report_restore_page = document.body.innerHTML;
		var cust_paym_report_print_area = document.getElementById("custPayReportPrintArea").innerHTML;
		document.body.innerHTML = cust_paym_report_print_area;
		window.print();
		document.body.innerHTML = cust_paym_report_restore_page;	
	});

	// ============================ End of System Special Reports ========================================
	
});

// ----------------------- Filling Customer Name Select Option Every Where in the System ---------------------
function fillCustomerNameEveryWhere() {
	var tn = "dXJRQXgrNWVack0vZTFqM21FRnZwdz09Ojpj11Mf5fWzffCtY+QEapNK";
	var post = {
		"action": "fetch_parameterless_everything",
		"dn": dn,
		"tn" : tn
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
			if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected value=''>--- No staff found ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected value=''>All</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,1] + "  " + row[i,2] + " == " + row[i,9] + " == </option>";
					}
				}
				
				$("#txtCustomerNameCustPayment").html(options);
				$("#txtSelectCustomerByCustomerAppReport").html(options);
				$("#custNameCustomersReport").html(options);
				$("#customerNameCustPayReport").html(options);
				
			}	
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Service Type Name Select Option ---------------------------
function fillServiceTypeEveryWhere() {

	var post = { "action" : "fill_service_type_appointment_approve" }

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- No services found ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected value=''>All</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}

				$("#txtSelectServiceTypeAppointment").html(options);
				$("#txtSelectCustomerByServiceAppReport").html(options);
				$("#txtSelectServiceTypeStaffAppointment").html(options);

			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Service Type in Special Offers ---------------------------
function fillServiceTypeSpecialOffers() {

	var post = { "action" : "fill_service_type_appointment_approve" }

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- No services found ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected value=''>All</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}

				$("#drpServiceProductType").html(options);
				
			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Service Type information in Special Offers ---------------------------
function fillServiceTypeInformationSpecialOffers() {
    
    var service_iddd = $("#drpServiceProductType").val();
    
	var post = { 
	    "service_iddd" : service_iddd,
	    "action" : "fill_service_type_information_special_offers"
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				if (Message == "No information found") {
				    //Nothing to do
				} else {
					$("#txtCurrenttPrice").val(Message);
				}

			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Product Type in Special Offers ---------------------------
function fillProductTypeSpecialOffers() {

	var post = { "action" : "fill_product_type_appointment_approve" }

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- No product found ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected value=''>All</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}

				$("#drpServiceProductType").html(options);
				
			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Product Type information in Special Offers ---------------------------
function fillProductTypeInformationSpecialOffers() {
    
    var service_iddd = $("#drpServiceProductType").val();
    
	var post = { 
	    "service_iddd" : service_iddd,
	    "action" : "fill_product_type_information_special_offers"
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				if (Message == "No information found") {
				    //Nothing to do
				} else {
					$("#txtCurrenttPrice").val(Message);
				}

			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Service Category Name Select Option ---------------------------
function fillServiceCategoryName() {
	var tn = "ajJSU1M2L285b2dMYWFlSjJHNTBORjk2a2RTWE9UNVhvQ3pYUFFsNzN1MD06OmgvVRas1blvFPhe8cdTtU4=";
	var post = {
		"action": "fetch_service_category",
		"dn": dn,
		"tn" : tn
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
			if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- Select service category ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected disabled value=''>--- Select service category ---</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}
				
				$("#serviceCategoryID").html(options);
				
			}	
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}


// ----------------------- Filling Product Category Name Select Option ---------------------------
function fillProductCategoryName() {
	var tn = "c1JGSEp1NGxGZE5XT0lYMlpzSVJCWHRBbUkrVFBsRFh4TkNwMm9yaXdhQT06OmYwZcukZxLiZ1pQdxxn1W4=";
	var post = {
		"action": "fetch_product_category",
		"dn": dn,
		"tn" : tn
	}

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
			if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- Select product category ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected disabled value=''>--- Select product category ---</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}
				
				$("#productCategoryID").html(options);
				
			}	
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Filling Product Type in purchase product ---------------------------
function fillProductTypeInPurchase() {

	var post = { "action" : "fill_product_type_appointment_approve" }

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  post,
		dataType: "JSON",
		success: function(data) {
			var Message = data.Message;
			var status = data.Status;
			
		    if (status == true) {
				
				var options = "";
				if (Message == "No information found") {
					options += "<option selected disabled value=''>--- No product found ---</option>";
				} else {
					var returned_info = Message.split("###");
					options += "<option selected value=''>All</option>";
					for (var i=0; i<=returned_info.length - 1; i++) {
						var row = returned_info[i].split("***");
						options += "<option value='" + row[i,1] + "'>" + row[i,2] + "</option>";
					}
				}

				$("#drpProductName").html(options);
				
			} else {
			    swal("", Message, "");
			}
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Send Automatic happy birth day email to customers ---------------------------
function sendHappyBirthDayEmailToCustomers() {

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  {"action": "send_hbd_email_to_customer"},
		dataType: "text",
		success: function(data) {
			//alert(data);
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Send appointment first reminder email to customers ---------------------------
function sendAppointmentFirstReminderEmailToCustomers() {

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  {"action": "send_appointment_first_reminder_email"},
		dataType: "text",
		success: function(data) {
			//alert(data);
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}

// ----------------------- Send appointment second reminder email to customers ---------------------------
function sendAppointmentSecondReminderEmailToCustomers() {

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  {"action": "send_appointment_second_reminder_email"},
		dataType: "text",
		success: function(data) {
			//alert(data);
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}


// ----------------------- Send appointment confirmation email to customers ---------------------------
function sendAppointmentConfirmationEmailToCustomers() {

	$.ajax({
		method: "POST",
		url: "api/main.php",
		data:  {"action": "send_appointment_confirmation_email"},
		dataType: "text",
		success: function(data) {
			//alert(data);
		}, error: function(e) {
			bs4pop.notice("<i class='fa fa-times-circle'></i> &nbsp;" + e, {type: "danger", position: "topright", appendType: "append"});
		}          
	});
}