	jQuery(document).ready(function(){
	jQuery('.textedit').jqte();
	var count=0;
	var countEdu = 0;
	var countPrj = 0;
	var countSkills = 0;
	var countCerts = 0;
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
			jQuery(".educations").append('<table  border="0"><tr><td><input type="text" placeholder="Degree / Title" name="vir['+countEdu+'][degree]" /></td><td><input type="text" placeholder="Board / University" name="vir['+countEdu+'][university]" /></td><td><input type="text" placeholder="From Year" name="vir['+countEdu+'][frm_yr]" /></td><td><input type="text" placeholder="To Year" name="vir['+countEdu+'][to_yr]" /></td></tr><tr><td><input type="text" placeholder="% Marks" name="vir['+countEdu+'][percentage_edu]" /><td colspan="2"><textarea name="vir['+countEdu+'][otherDetails_edu]" class="textedit"></textarea></td><td><button type="button" class="button-large button button-primary removeEducation">Remove Experience</button></td></tr></table>');
			jQuery('.educations .textedit:last').jqte();
		});
		jQuery(".removeEducation").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Educational Details ?')) return false;
			else
            jQuery(this).closest('table').remove();
			return true;
		});	
		
		
		jQuery(".addProject").click(function(){
			countPrj = countPrj + 1;
			jQuery('.projects').append('<table border="0"><tr><td><input type="text" name="vir['+countPrj+'][project_title]" placeholder="Project Title"/></td><td><input type="text" name="vir['+countPrj+'][project_technologyUsed]" placeholder="Technologies Used" /></td></tr><tr><td colspan="2"><textarea placeholder="Project Description" name="vir['+countPrj+'][project_description]" class="textedit"></textarea></td></tr><tr><td colspan="2"><button type="button" class="button-large button button-primary removeProject">Remove Project</button><br><br></td></tr></table>');
			jQuery('.projects .textedit:last').jqte();
		});
		
		jQuery(".removeProject").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Project ?')) return false;
			else
            jQuery(this).closest('table').remove();
			return true;
		});
		jQuery(".addSkills").click(function(){
			countSkills = countSkills + 1;
			jQuery('.skills').append('<table border="0"><tr><td><input type="text" name="vir['+countSkills+'][skill]" placeholder="Skills"></td><td><input type="number" name="vir['+countSkills+'][skill_rating]" max="10" placeholder="Skill Rating" min="0"> / 10</td><td><button type="button" class="button-large button button-primary removeSkill">Remove Skill</button></td></tr></table>');
		});
		jQuery(".removeSkill").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Skill ?')) return false;
			else
            jQuery(this).closest('table').remove();
			return true;
		});
		
		jQuery(".addCertification").click(function(){
			countCerts = countCerts + 1;
			jQuery('.certifications').append('<table border="0"><tr><td><input type="text" name="vir['+countCerts+'][certification]" placeholder="Certification Name / Title"></td><td><textarea name="vir['+countCerts+'][certification_details]"  class="textedit" placeholder="Certification Details" ></textarea></td><td><button type="button" class="button-large button button-primary removeCertification">Remove Certification</button></td></tr></table>');
			jQuery('.certifications .textedit:last').jqte();
		});
		jQuery(".removeCertification").live('click', function() {
			if(!confirm('Are you sure that you want to remove this Certification ?')) return false;
			else
            jQuery(this).closest('table').remove();
			return true;
		});
	});
	