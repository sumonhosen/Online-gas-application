<?php
 session_start();
   if (!isset($_SESSION['adminId'])) {
        header('location: login.php');
      }
    include('db.php');
    require('pdf/fpdf.php');

    if(isset($_GET['user_id'])){
        $user_id = $_GET['user_id'];
        $user_data = mysqli_query($conn,"SELECT users.*, industry.*, organization_owner.*, industry2.*, industry3.*, industry4.*,organization_owner.name As organization_name,
                                                industry.mobile As industry1_mobile,industry.email As industry1_email
                                                ,industry2.organization_name As ind2_organization_name,
                                                organization_owner.designation As organization_designation,
                                                industry3.application_name As ind3_application_name,
                                                industry4.designation As ind4_desingnation
                                                FROM users
                                                JOIN industry ON users.id = industry.user_id
                                                JOIN organization_owner ON industry.id=organization_owner.industry_id
                                                JOIN industry2 ON industry.id=industry2.industry_id
                                                JOIN industry3 ON industry.id=industry3.industry_id
                                                JOIN industry4 ON industry.id=industry4.industry_id
                                                WHERE users.id='$user_id' ");

        $n = mysqli_fetch_array($user_data);

        class PDF extends FPDF{
            function Header(){
                    $this->Image('sgcl_logo.png',0,0,20);
                    $this->SetFont('Arial','B',14);
                    $this->Cell(0,5,'Sundarban Gas Company Limited (A Company of Petrobangla)	',0,0,'C');
                    $this->Ln(5);
                    $this->SetFont('Arial','',10);
                    $this->Cell(0,5,'218,M. A. Bari Sarak , Abir Tower, Sonadanga , Khulna-9100',0,0,'C');
                    $this->Ln(5);
                    $this->SetFont('Arial','',10);
                    $this->Cell(0,5,'Industrial/Seasonal/Captive/C.N.G./Others Gas Connection Application',0,0,'C');
                    $this->Ln(10);

                }

            }
  

        $pdf = new PDF();
        header('Content-type: application/download;filename="example.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');
        $pdf->AliasNbPages();
        $pdf->AddPage();

        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'Application ID:',1,0);
        $pdf->cell(90,5,$n['application_id'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'Application Date:',1,0);
        $pdf->cell(90,5,$n['application_date'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'Zone:',1,0);
        $pdf->cell(90,5,'Zone-1:Tikatuli',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'1. Factory Name:',1,0);
        $pdf->cell(90,5,$n['factory_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'2. Factory Address:',1,0);
        $pdf->cell(90,5,$n['factory_address1'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,'3. Factory Telephone (If Any):',1,0);
        $pdf->cell(90,5,$n['factory_telephone'],1,0);

        $pdf->Ln(5);
        $pdf->cell(100,5,'4. Main Office Address:',1,0);
        $pdf->cell(90,5,$n['main_address1'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,'5. Main Office Telephone (If Any):',1,0);
        $pdf->cell(90,5,$n['main_office_phone'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'6. Billing Address:',1,0);
        $pdf->cell(90,5,$n['billing_address1'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,'7. Billing Telephone No (If Any):',1,0);
        $pdf->cell(90,5,$n['billing_telephone'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'8. Mobile:',1,0);
        $pdf->cell(90,5,$n['industry1_mobile'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'9. Email:',1,0);
        $pdf->cell(90,5,$n['industry1_email'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'10. National ID:',1,0);
        $pdf->cell(90,5,$n['national_id'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'11. Tax Identification No:',1,0);
        $pdf->cell(90,5,$n['tex_identification'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'12. GIS Location:',1,0);
        $pdf->cell(90,5,$n['gis_location'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'13. Organization Ownership Type:',1,0);
        $pdf->cell(90,5,$n['organization_ownership'] ,1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'14. Industry Type:',1,0);
        $pdf->cell(90,5,$n['industry_type'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'15. Trade License No:',1,0);
        $pdf->cell(90,5,$n['trade_licence_no'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'16. License Expiry Date:	',1,0);
        $pdf->cell(90,5,$n['licence_expiry_date'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"17. Organization Owner/Director's Information:",1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(8);

        $pdf->Cell(30,18,'SL no', 1,0);
        $pdf->Cell(30,18,'Name', 1,0);
        $x = $pdf->GetX();
        $pdf->Cell(65,6,"a) Father/Husband's Name", 1,0);
        $pdf->Cell(65,6,'a) Designation', 1,1);
        $pdf->SetX($x);
        $pdf->Cell(65,6,'b) Present Address', 1,0);
        $pdf->Cell(65,6,'b) Relation with Other Organization', 1,1);
        $pdf->SetX($x);
        $pdf->Cell(65,6,'c) Mobile', 1,0);
        $pdf->Cell(65,6,'c) Email', 1,1);
        $pdf->Ln(0);

        $name = $n['organization_name'];
        $father_hus_name = $n['father_hus_name'];
        $present_address = $n['present_address'];
        $mobile          = $n['organization_mobile'];
        $designation     = $n['organization_designation'];
        $relation        = $n['relation'];
        $email           = $n['email'];

        $names = explode(',',$name);

        $father_hus_names   = explode(',',$father_hus_name);

        $present_addresses  = explode(',',$present_address);
        $mobiles            = explode(',',$mobile);
        $designations       = explode(',',$designation);
        $relations          = explode(',',$relation);
        $emails             = explode(',',$email);


        foreach($names as $key => $value){

        $pdf->Cell(30,18,$key+1, 1,0);
        $pdf->Cell(30,18,$names[$key], 1,0);
        $x = $pdf->GetX();
        $pdf->Cell(65,6,$father_hus_names[$key], 1,0);
        $pdf->Cell(65,6,$designations[$key], 1,1);
        $pdf->SetX($x);
        $pdf->Cell(65,6,$present_addresses[$key], 1,0);
        $pdf->Cell(65,6,$mobiles[$key], 1,1);
        $pdf->SetX($x);
        $pdf->Cell(65,6,$mobiles[$key], 1,0);
        $pdf->Cell(65,6,$emails[$key], 1,1);
        $pdf->Ln(0);
        }
        $pdf->Ln(5);

        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'18. Location Related Information:',1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.1. Mouza Name:',1,0);
        $pdf->cell(90,5,$n['mouza_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.2. Daag No:',1,0);
        $pdf->cell(90,5,$n['daag_no'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.2. Khotiyan No:',1,0);
        $pdf->cell(90,5,$n['khotiyan_no'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.3. Total Land Area (In Acre):',1,0);
        $pdf->cell(90,5,$n['total_land_area'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.4. Land Ownership:',1,0);
        $pdf->cell(90,5,$n['land_ownership'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.5. Land Width (Feet):',1,0);
        $pdf->cell(90,5,$n['land_width'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.6. Land Length (Feet):',1,0);
        $pdf->cell(90,5,$n['land_length'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.7. Owner Name If Rented:',1,0);
        $pdf->cell(90,5,$n['owner_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.8. Owner Address If Rented:	',1,0);
        $pdf->cell(90,5,$n['owner_address'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.9. Lease Provider Organization Name If Leased:',1,0);
        $pdf->cell(90,5,$n['ind2_organization_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.10. Lease Provider Organization Address If Leased:',1,0);
        $pdf->cell(90,5,$n['organization_address'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'If Yes Then Fill The Below Section:',1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'18.1.11.Till Now.Any Other Customer Used Gas In Subjected Land:', 1);
        $pdf->cell(90,5,$n['till_now'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,'If Yes Then Fill The Below Section:', 1);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"18.1.12. Previous Customer's Customer Code:", 1);
        $pdf->cell(90,5,$n['customer_code'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"18.1.13. Factory/Organization Name:", 1);
        $pdf->cell(90,5,$n['factory_organization'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,"18.1.14. Customer Name:", 1);
        $pdf->cell(90,5,$n['customer_name'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,"118.1.15. Connection Status:", 1);
        $pdf->cell(90,5,$n['connection_status'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"18.1.16. No Demand Certificate For The Clearance Of Gas Bill:", 1);
        $pdf->cell(90,5, $n['gash_bill'],1,0);
        $pdf->Ln(15);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,"18.1.17.Is Organization Owner,Partner,Chairman Other Directors", 1,0);
        $pdf->cell(90,5,$n['partner_owner'],1,0);
        $pdf->Ln(5);

        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'18.1.18. If Yes, Then Customer Code No:',1,0);
        $pdf->cell(90,5,$n['customer_code_no'],1,0);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'18.1.19. Other Organization Name:',1,0);
        $pdf->cell(90,5,$n['other_organization_name'],1,0);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'18.1.20. Other Organization Status:',1,0);
        $pdf->cell(90,5,$n['other_organization_status'],1,0);
        $pdf->Ln(5);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,"19. Organization's Manufacturing Related Information:",1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"19.1. Production Type:",1,0);
        $pdf->cell(90,5,$n['production_type'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"19.2. Factory Starting Time:",1,0);
        $pdf->cell(90,5,$n['factory_start_time'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"19.3. Factory Ending Time:",1,0);
        $pdf->cell(90,5,$n['factory_end_time'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"20. Financial Information:",1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"20.1. Organization Tax Identification No (TIN) :",1,0);
        $pdf->cell(90,5,$n['tex_identification'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"20.2. VAT Registration No (If Applicable):",1,0);
        $pdf->cell(90,5,$n['vat_registration'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"20.3. Bank Name:",1,0);
        $pdf->cell(90,5,$n['bank_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,"20.4. Bank Branch:	",1,0);
        $pdf->cell(90,5,$n['bank_branch'],1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,"21. Load Related Information:",1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(5);

        $pdf->cell(100,5,"21.1. Appliance and Burner Related Information:",1,0);
        $pdf->cell(90,5,'',1,0);
        $pdf->Ln(10);

        $pdf->SetFont('Arial','',8);
        $pdf->Cell(5 ,5,'Sl',1);
        $pdf->Cell(25 ,5,'Appliance Name',1);
        $pdf->Cell(25 ,5,'Appliance Size,Ft',1,0);
        $pdf->Cell(40 ,5,'Appliance Production Capacity' ,1,0);
        $pdf->Cell(25 ,5,'Burner Type',1,0);
        $pdf->Cell(25 ,5,'Burner Count',1,0);
        $pdf->Cell(25 ,5,'Burner Capacity',1,0);
        $pdf->Cell(21 ,5,'Total load',1,0);/*end of line*/
        $pdf->Ln(5);

        $application_name = $n['ind3_application_name'];
        $application_size = $n['application_size'];
        $application_production = $n['application_production'];
        $burner_type      = $n['burner_type'];
        $burner_count     = $n['burner_count'];
        $burner_capacity  = $n['burner_capacity'];
        $total_load       = $n['total_load'];
        $commnet          = $n['comment'];

        $application_names = explode(',',$application_name);

        $application_sizes =  explode(',',$application_size);
        $application_productions =  explode(',',$application_production);
        $burner_types      =  explode(',',$burner_type);
        $burner_counts     =  explode(',',$burner_count);
        $burner_capacities =  explode(',',$burner_capacity);
        $total_loads       =  explode(',',$total_load);
        $commnets          =  explode(',',$commnet);



        foreach($application_names as $key => $value){
        $pdf->Cell(5 ,5,$key+1,1);
        $pdf->Cell(25 ,5,$application_names[$key],1);
        $pdf->Cell(25 ,5,$application_sizes[$key],1,0);
        $pdf->Cell(40 ,5,$application_productions[$key],1,0);
        $pdf->Cell(25 ,5,$burner_types[$key],1,0);
        $pdf->Cell(25 ,5,$burner_counts[$key],1,0);
        $pdf->Cell(25 ,5,$burner_capacities[$key],1,0);
        $pdf->Cell(21 ,5, $total_loads[$key],1,0);/*end of line*/
        $pdf->Ln(5);

        }

        $pdf->Ln(10);
        $pdf->SetFont('Arial','',9);
        $pdf->cell(100,5,'21.2. Gas Usage/Hour:',1,0);
        $pdf->cell(90,5,$n['gas_hour'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'21.3. Gas Usage Unit:',1,0);
        $pdf->cell(90,5,$n['gas_unit'],1,0);
        $pdf->Ln(10);
        $pdf->cell(190,5,'21.4. Expected Gas When Need:',1,0);

        $pdf->Ln(5);
        $pdf->cell(63,5,"Year:",1,0);
        $pdf->cell(63,5,"Demand:",1,0);
        $pdf->cell(64,5,'Cubic Meter',1,0);
        $pdf->Ln(5);

        $year              = $n['year'];
        $demand            = $n['demand'];
        $cubic_meter       = $n['cubic_meter'];

        $years              =  explode(',',$year);                    
        $demands            =  explode(',',$demand);                    
        $cubic_meters       =  explode(',',$cubic_meter);               
                           
        foreach($years as $key => $value){
            $pdf->cell(63,5,$years[$key],1,0);
            $pdf->cell(63,5,$demands[$key],1,0);
            $pdf->cell(64,5,$cubic_meters[$key],1,0);
            $pdf->Ln(5);

        }
        $pdf->Ln(5);
        $pdf->cell(190,5,'21.5. Production Related Information used yearly ingredients:',1,0);
        $pdf->Ln(5);
        $pdf->cell(63,5,"Produced Goods Name:",1,0);
        $pdf->cell(63,5,"Yearly Production:",1,0);
        $pdf->cell(64,5,'Where Sold(Local/International)',1,0);
        $pdf->Ln(5);
            $goods_name        = $n['goods_name'];
            $yearly_production = $n['yearly_production'];
            $sold              = $n['sold'];

            $goods_names        =  explode(',',$goods_name);               
            $yearly_productions =  explode(',',$yearly_production);        
            $solds              =  explode(',',$sold); 

            foreach($goods_names as $key => $value){
                $pdf->cell(63,5,$goods_names[$key],1,0);
                $pdf->cell(63,5,$yearly_productions[$key],1,0);
                $pdf->cell(64,5,$solds[$key],1,0);
                $pdf->Ln(5);
            }
        $pdf->Ln(5);
        $pdf->cell(190,5,'22. Information of related person(s) who has signatory power/contact to accomplish any required process: ',1,0);
        $pdf->Ln(10);

        $pdf->Cell(20,18,'Sl', 1,0);
        $x = $pdf->GetX();
        $pdf->Cell(80,6,"a) Name", 1,0);
        $pdf->Cell(90,6,'a) National ID', 1,1);
        $pdf->SetX($x);
        $pdf->Cell(80,6,'b) Designation', 0,0);
        $pdf->Cell(90,6,'b) Mobile', 1,1);
        $pdf->SetX($x);
        $pdf->Cell(80,6,'- - - - - - -', 1,0,'C');
        $pdf->Cell(90,6,'c) Email', 1,1);
        $pdf->Ln(0);
        
        $images         = $n['image'];
        $signature      = explode(',',$images);
        $name           = $n['name'];
        $desingnation   = $n['desingnation'];
        $national       = $n['national'];
        $mobile         = $n['mobile'];
        $email          = $n['email'];
        $names          = explode(',',$name);
        $desingnations  = explode(',',$desingnation);
        $nationals      = explode(',',$national);
        $mobiles        = explode(',',$mobile);
        $emails         = explode(',',$email);

            foreach($names as $key => $value){
                $pdf->Cell(20,18,$key+1, 1,0);
                $x = $pdf->GetX();
                $pdf->Cell(80,6,$names[$key], 1,0);
                $pdf->Cell(90,6, $nationals[$key], 1,1);
                $pdf->SetX($x);
                $pdf->Cell(80,6,$designations[$key], 0,0);
                $pdf->Cell(90,6,$mobiles[$key], 1,1);
                $pdf->SetX($x);
                $pdf->Cell(80,6,'- - - - - - -', 1,0,'C');
                $pdf->Cell(90,6,$emails[$key], 1,1);
            }


        $pdf->Ln(10);
        $pdf->MultiCell(190,5,"23. I/We declare that all entered information and attached documents are correct and valid. I/We will be bound to follow all rules and regulations. I/We also agree that we will construct the RMS room as per design and no changes will be applied without company's authorized permission.",1);
        $pdf->Ln(5);
        $pdf->cell(100,5,'Applicant Name',1,0);
        $pdf->cell(90,5,$n['application_name'],1,0);
        $pdf->Ln(5);
        $pdf->cell(100,5,'Designation',1,0);
        $pdf->cell(90,5,$n['ind4_desingnation']??'',1,0);
        $pdf->Ln(10);
        $pdf->cell(100,5,'Signature:',1,0);
        $pdf->Image('upload/'.$signature[9],112, null, 6);
        $pdf->Ln(5);

        $pdf->cell(170,5,'24. Attachments:	',1,0);
        $pdf->cell(20,5,'',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.1. Passport Size Photo:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.3. TIN Certificates:	',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,"24.4. Memorandum & Article Of Association and Certificate Of Incorporation's (For Registered Companies):	",1,0);

        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.1. 24.5. Proof Document:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.6. Rent Agreement:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,"24.7. Factory's Layout Plan:	",1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.9. Technical Catalog:	',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.10. Signature:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.11. Nid:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.12. Industry Certificate:	',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.13. Environment Noc:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->cell(170,5,'24.14. Others:',1,0);
        $pdf->cell(20,5,'Yes',1,0);
        $pdf->Ln(5);
        $pdf->Output('D', "invoice.pdf", true);

    }
?>
