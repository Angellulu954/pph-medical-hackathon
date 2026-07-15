public function evaluateIntrapartum($patient)
{

    $result = [
        "risk"=>"LOW",
        "reasons"=>[],
        "recommendations"=>[]
    ];

    $rules = [

        [
            "condition"=>$patient->prolonged_labour,
            "risk"=>"MODERATE",
            "reason"=>"Prolonged labour",
            "recommendation"=>"Increase monitoring."
        ],

        [
            "condition"=>$patient->failure_to_progress,
            "risk"=>"HIGH",
            "reason"=>"Failure to progress",
            "recommendation"=>"Senior obstetric review."
        ],

        [
            "condition"=>$patient->retained_placenta,
            "risk"=>"HIGH",
            "reason"=>"Retained placenta",
            "recommendation"=>"Prepare for manual removal."
        ],

        [
            "condition"=>$patient->episiotomy,
            "risk"=>"MODERATE",
            "reason"=>"Episiotomy",
            "recommendation"=>"Observe for bleeding."
        ],

        [
            "condition"=>$patient->perineal_laceration,
            "risk"=>"MODERATE",
            "reason"=>"Perineal laceration",
            "recommendation"=>"Repair and monitor bleeding."
        ],

        [
            "condition"=>$patient->general_anaesthesia,
            "risk"=>"MODERATE",
            "reason"=>"General anaesthesia",
            "recommendation"=>"Monitor uterine tone."
        ],

        [
            "condition"=>$patient->uterine_atony,
            "risk"=>"HIGH",
            "reason"=>"Poor uterine contraction",
            "recommendation"=>"Prepare uterotonics immediately."
        ],

        [
            "condition"=>$patient->uterine_rupture,
            "risk"=>"HIGH",
            "reason"=>"Suspected uterine rupture",
            "recommendation"=>"Emergency surgery."
        ],

        [
            "condition"=>$patient->genital_tract_trauma,
            "risk"=>"HIGH",
            "reason"=>"Birth canal trauma",
            "recommendation"=>"Control bleeding immediately."
        ]

    ];

    foreach($rules as $rule){

        if($rule["condition"]){

            $result["reasons"][] = $rule["reason"];
            $result["recommendations"][] = $rule["recommendation"];

            if($rule["risk"]=="HIGH"){
                $result["risk"]="HIGH";
            }
            elseif($result["risk"]!="HIGH"){
                $result["risk"]="MODERATE";
            }

        }

    }

    return $result;

}