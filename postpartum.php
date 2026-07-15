public function evaluatePostpartum($patient)
{

    $result = [

        "status"=>"NORMAL",
        "reasons"=>[],
        "recommendations"=>[]

    ];

    if($patient->blood_loss >= 500){

        $result["status"]="MINOR PPH";

        $result["reasons"][]="Blood loss ≥500 ml";

    }

    if($patient->blood_loss >1000){

        $result["status"]="MAJOR PPH";

        $result["reasons"][]="Blood loss >1000 ml";

    }

    if($patient->blood_loss >2000){

        $result["status"]="SEVERE PPH";

        $result["reasons"][]="Blood loss >2000 ml";

    }

    if($patient->systolic_bp <80){

        $result["reasons"][]="Very low blood pressure";

        $result["recommendations"][]="Immediate emergency response.";

    }

    if($patient->tachycardia){

        $result["reasons"][]="Rapid heart rate";

    }

    if($patient->tachypnoea){

        $result["reasons"][]="Rapid breathing";

    }

    if($patient->altered_mental_state){

        $result["reasons"][]="Altered mental status";

        $result["recommendations"][]="Immediate senior review.";

    }

    if($patient->ongoing_bleeding){

        $result["recommendations"][]="Activate major PPH protocol.";

    }

    if($patient->retained_products){

        $result["recommendations"][]="Evaluate for retained products of conception.";

    }

    if($patient->suspected_endometritis){

        $result["recommendations"][]="Evaluate for postpartum infection.";

    }

    return $result;

}