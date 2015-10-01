	jQuery(document).ready(function(){
	jQuery('.textedit').jqte();
	var count=0;
	var countEdu = 0;
	jQuery(".addExperience").click(function(){
		 count = count + 1;
		jQuery(".experiences").append('<div class="experience'+count+'"><input type="text" placeholder="Company" class="company'+count+'" name="vir['+count+'][company]" style="width:100%; width:20%; float:left; margin-right:5%;"/><input type="text" placeholder="Designation" name="vir['+count+'][designation]" style="width:20%; float:left; margin-right:5%; "><input type="text" placeholder="From" name="vir['+count+'][frm]" style="width:20%; float:left; margin-right:5%;"><input type="text" placeholder="To" name="vir['+count+'][to_yr]" style="width:20%; float:left;margin-right:4%;  "><div class="inside" style="clear:both;"><label style="padding:8px 0px; clear:both;"><input type="checkbox" placeholder="To" name="vir['+count+'][curr_employer]">Current Employer</label></div><div class="inside"><textarea placeholder="Section Content" name="vir['+count+'][experience_detail]" style="width:100%;" class="textedit" /></textarea></div><button type="button" class="button-large button button-primary remove">Remove Experience</button><br><br><br></div>');
		jQuery('.textedit:last').jqte();
		 
			
        });
		jQuery(".remove").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Experience ?')) return false;
			else
            jQuery(this).closest('div').remove();
			return true;
		});	
		jQuery(".addEducation").click(function(){
			jQuery(".educations").append('<table  border="0"><tr><td><input type="text" placeholder="Degree / Title" name="vir_edu['+countEdu+'][degree]" /></td><td><input type="text" placeholder="Board / University" name="vir_edu['+countEdu+'][university]" /></td><td><input type="text" placeholder="From Year" name="vir_edu['+countEdu+'][frm_yr]" /></td><td><input type="text" placeholder="To Year" name="vir_edu['+countEdu+'][to_yr]" /></td></tr><tr><td><input type="text" placeholder="% Marks" name="vir_edu['+countEdu+'][percentage]" /><td colspan="2"><textarea name="vir_edu['+countEdu+'][otherDetails]" class="textedit"></textarea></td><td><button type="button" class="button-large button button-primary removeEducation">Remove Experience</button></td></tr></table>');
			jQuery('.educations .textedit:last').jqte();
		});
		jQuery(".removeEducation").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Educational Details ?')) return false;
			else
            jQuery(this).closest('table').remove();
			return true;
		});	
	});
	