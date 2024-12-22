<?php $page = 'faqs';include('include/header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CUSTOM STYLESHEET -->
    <link href="https://fonts.googleapis.com/css?family=Inter" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:400,600,700|Material+Icons|Material+Icons+Outlined' rel='stylesheet' type='text/css' />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="common.css">
    <style>
        html, body{
        max-width: 100%;
        overflow-x: hidden;
        }
        
        .container{
            text-align: justify;
            line-height: 1.6;
            width: 62.5vw;
            margin: auto;
        }

        .spacing{
            height: 50px;
        }

        @media (max-width: 1280px) {
            .container{
            width: 93.75vw;
        }
        }

        @media (max-width: 900px) {
            .container{
            padding:10px;
        }
        .lnkexpand {
            padding: 20px 10px 20px 20px;
        }
        .faqtext{
            margin-right: 5%;
        }
        }
    </style>

    <style>
        .lnkexpand {
        cursor: pointer;
        line-height: 1.8;
        }

        .hidden-content{
            text-align: justify;
            line-height: 1.8;
            padding:15px 0 0;
            /* padding: 15px 20px 0 20px; */
        }

        .faqtext{
            font-weight:600;
        }

        .faqicon{
            width: 30px;
            height: 30px;
            justify-content: center;
            align-items: center;
        }

        .faqicon .material-icons {
            color: #0C71C3;
            font-size: 24px;
        }

        .faqicon .material-icons::before {
            content: "add";
        }

        .activefaq .faqicon .material-icons::after {
            content: "remove";
            left: -6px;
        }

        .activefaq .faqicon .material-icons::before{
            display: none;
        }
</style>
    <script>
  function initMenu1() {
    $('.hidden-content').hide();
    $('.lnkexpand').click(
      function() {
        $(this).next('.hidden-content').slideToggle('normal');
        if ($(this).hasClass("activefaq")) {
          $(this).removeClass("activefaq");
        }
        else {
          $(this).addClass("activefaq");
        };
      });
  };
  $(document).ready(function() {
    initMenu1();
  });
</script>
</head>
<body>
    <div class="container">
        <h1>FAQs</h1>
        <div>
            <div class="lnkexpand" style="display:flex; justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">1. Does SPCA KK receive stray dogs or cats?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">SPCA KK does not routinely take in stray dogs or cats unless they are in critical condition (e.g. severely injured, accidental cases, hit and run, hot water burns, abandoned puppies and kittens). We are in no position to accept all stray dogs & cats simply because of the lack of resources to do so.
            <br/>
            <br/>
            Stray animals in the street today are the result of IRRESPONSIBLE Pet owners who did not neuter their pets and allow uncontrolled breeding to take place. Statistic shows that if two dogs and their offspring are allowed to reproduce freely, there can be an addition of 2,048 dogs in just 4 years. In similar time span, two cats will lead to a staggering 20,736 number of cats.
            <br/>
            <br/>
            In an effort to reduce the population of stray animals in Kota Kinabalu, SPCA KK and DBKK have implemented the TNR (Trap-Neuter-Release) project since April 2013. TNR is a method of humanely trapping stray animals to spay or neuter them, and then releasing them back to the same location where they were found. This is important because returning them to the territory where they came from means that they will know their way to find food and shelter. It will also stop the migration of outside animals to that area. SPCAKK would like to appeal to the general public to support this project and treat them humanely. They are usually recognised by one of their ears being clipped.
            <br/>
            <br/>
            If your housing area is having problems with increasing population of strays, do contact SPCA KK Hotline 019-8809660 for advice to start a neutering program. We can arrange for the vets to come in to sterilized the animals if you can help to raise funds from your community.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">2. We have too many dogs (or cats) at home, would you take some/all of them?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">There are many unwanted animals in Kota Kinabalu and SPCA KK does not have the space nor the resources to take in all unwanted animals. We appeal to owners and finders to take on the responsibility of finding a new home for the animal they cannot keep.
            <br/>
            <br/>
            Every animal re-homed by an owner or member of the public without having to come through our doors means an extra space in our shelter for more critical cases. It is easier for you to find a home for one animal than it is for us to find a home for hundreds of animals. With your help, we can free up more resources to help the sick and abused animals with more urgent needs.
            <br/>
            <br/>
            The fact that you have too many animals is the result of uncontrolled breeding. So, the first and immediate step you should take is to arrange for all your pets to be neutered or spayed and then, consider one of the following options:                                                    <br/>
            <br/>
            1. Ask your friends and relatives whom you think can provide a good home.
            <br/>
            2. Put up an adoption ad on your Facebook but you must ensure that potential adopters are screened thoroughly to make sure that your animals are going to a suitable home. We will be happy to advise you on the screening procedures.
            <br/>
            3. Join our animal adoption event which is held at Harvest Fish & Pet once a month. Please check out the dates on our Facebook. However, if the animals are not adopted, you need to take them back until our next adoption drive.
            <br/>
            <br/>
            Having exhausted the above methods, and if you still want to give up your pets, you can apply to SPCA KK to surrender. The acceptance of the animals is at the discretion of SPCA KK and we can only accept when the surrender procedures are being observed.
            <br/>
            <br/>
            Procedure for surrendering your pet(s):
            <br/>
            <br/>
            You must have thought over the decision thoroughly and have exhausted all other options to re-home. The necessary details on surrender form must be filled in and the surrender fee is paid. By signing the form, you transfer ownership of the animal(s) to SPCA KK.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">3. What do we do with injured stray animals in car accidents, bad skin problems, blindness, or in life threatening situations?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">1. Call the SPCA KK hotline 019-8809660 and provide details such as the condition of the animal, address of the location, your name and your contact number. Please stay with the animal until our arrival. We will dispatch our animal rescue volunteer(s) to your location as soon as possible. Very often, if there is no one keeping an eye on the animal, the animal may move away from the location you spotted it. Under these circumstances, the rescue officer may not be able to find the injured animals when they arrive at the scene. This will be a waste of time and resources of our rescue team.
            <br/>
            <br/>
            2. You may help by bringing the animal to a safer location (e.g. away from traffic, off a crowded area) and confine it (in a box or carrier etc). If you are unable to do so, please stay with the animal until our arrival.
            <br/>
            <br/>
            3. If possible, you can help the animal yourself by taking the animal to the nearest veterinarian and we will attend to the case as soon as possible.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">4. I saw an animal (dog/cat) in distress at ____(e.g. Taman Foh Sang, City Mall, etc) when I drove by there? Can SPCA KK attend to it?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please refer to Q.3 above.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">5. What do we do with animals being abused by their owners, e.g. no food or drinking water, provide dirty water or rotten food, constantly being caged, chained and threatened with physical violence?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">If you witness an act of deliberate cruelty (resulting in injury or death) or abandonment of an animal you can take the following steps:
            <br/>
            <br/>
            1. Call the SPCA KK at 019-8809660 and provide details such as the condition of the animal, address of the location, your name and your contact number.
            <br/>
            <br/>
            2. Take a picture or video of the suspect if it is safe to do so. Note any distinguishing features of the owner and clothing/accessories worn, car-make, vehicle numbers, and location details. Forward whatever details you have to SPCA KK hotline 019-8809660.
            <br/>
            <br/>
            3. You may make a report at Jabatan Perkhidmatan Haiwan or police station. SPCAKK's inspectorate will look into the case and where possible, bring in the authorities such as Wildlife Department, DBKK etc. In serious cases, a police report will be made and the offenders may face a penalty. Our priority is also to remove the animal from the abusive situation.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">6. How do we report cases of dog slaughtering for meat trade?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">To be able for the Police or Jabatan Haiwan (088-232499) to take action, please call SPCA Hotline 019-8809660 and provide with details such as address of the location, your name and your contact number. Please take pictures or video of the suspect if it is safe to do so. Note any distinguishing features of the suspect and clothing/accessories worn, car-make, vehicle numbers, and location details. Forward whatever details you have to SPCA KK hotline 019-8809660 or info@spcakk.org
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">7. What do we do when our dogs have been rounded up by DBKK?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please contact DBKK hotline at 210011. You MUST claim your dog back from DBKK dog pound within 48 hours. Otherwise the animal will be disposed off by the authorities.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">8. What are the adoption procedures of SPCA KK?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please refer to our website adoption page.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">9. Do we need to pay an adoption fee?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Yes, unfortunately SPCA KK has to collect an adoption fee which is to cover for the vaccination, neutering/spaying and other expenses that has been spent to prepare the animal for a healthy start in life. Please refer to our adoption page for more details.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">10. Do you provide animal boarding service?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Boarding service is provided only in exceptional circumstances where detailed assessment is first made and approved by the inspectorate committee. Terms and conditions apply.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">11. Would SPCA KK adopt our pets, if we continue to pay all expenses including food and veterinary care?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">SPCA KK does not adopt animals. We prepare animals for adoption only.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">12. I want to surrender my dog/cat. What is the procedure to do so?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Refer to question No.2 above.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">13. I found a newborn/ young kitten/puppy. What should I do?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Sometimes you may come across a litter of kittens/pups huddled under the building stairs, in a playground, in an abandoned building etc. Please do the following steps:
            <br/><br/>
            1. Be patient and monitor them for several hours to see if their mother comes back - mother cats/dogs have to leave their litter to search for food and water several times a day. If you or someone you know can foster them, please take the young ones in together with their mother - as they stand a much higher chance of surviving with their mothers’ milk and care. However if you observe that the mother dog/cat has not returned the whole day, or if the pups/kittens look like they have been abandoned for a few days (judging from their poor hydration, dirty condition of their fur, etc) please do pick them up and either foster them yourself or find them a foster home - as they will not survive out there on their own.
            <br/><br/>
            2. Call SPCAKK hotline 019-8809660 for further advice.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">14. Why should I sterilize my pet?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Abandonment of pets is quite common in SPCAKK’s experience, whether it is dogs or cats. Every month, SPCAKK receives many calls requesting to take away unwanted animals. Unfortunately, SPCAKK does not have the space or the money to shelter so many animals. So what you can do to help is to sterilize your pet and encourage other pet owners to do the same. Please refer to Q.25 Benefits of Animal Sterilization.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">15. My pet passed away, does SPCAKK provide burial service?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">No, SPCAKK doesn’t provide burial service.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">16. Is SPCAKK a registered NGO? What is her objective?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Yes, SPCAKK was officially registered on 14th of February 2006. The objective of SPCAKK is to promote kindness and respect for all animals and to free them from sufferings, abuses and exploitations.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">17. Where is the SPCAKK animal adoption center?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">SPCAKK animal adoption center is currently located at Kg.Langkuas, Lok Kawi, Jalan Papar Lama.
            </div>
        </div>
        <div style="height: 40px;">
        </div>
        
        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">18. How do I become a member?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please refer website membership page.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">19. How do I become a volunteer?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please refer website get involved page.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">20. How do I make a donation to SPCA KK?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please refer website donation page.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">21. Are monetary donations tax exempted?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Yes, a tax exemption receipt will be issued for every monetary donation made to enable donors claim for tax exemption (LHDN. 01/35/42/51/179-6.6668).
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">22. Where does my donated money go to?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Your funding goes a long way. We spend an average of RM 18,000 a month on the following:
            <br/><br/>
            <ul class="ulContent">
            <li>Animal medical expenses</li>
            <li>Animal rescue expenses</li>
            <li>Spaying, neutering & vaccination</li>
            <li>Food supplies</li>
            <li>Shelter rental</li>
            <li>Workers’ salaries</li>
            <li>Insurance</li>
            <li>Utility bills</li>
            <li>Maintenance and repair works of animal adoption center, such as grass cutting, plumbing, fixing cages, etc.</li>
            <li>Public awareness programs</li></ul>
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">23. How does SPCA KK operate?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">SPCAKK is made up of VOLUNTARY members of the public who donate their time and energy to the cause. Led by the President and Vice President, the Executive Committee includes the Secretary, Asst. Secretary, Treasurer and the following committees:
            <br/><br/>
            <ul class="ulContent">
            <li>Education</li>
            <li>Inspectorate</li>
            <li>Events & Fundraising</li>
            <li>Publicity & Communication</li>
            <li>Shelter</li></ul>
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">24. How much does it cost to spay or neuter an animal at private animal clinic?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Prices vary with each clinic. Please check with your local animal clinic and Jabatan Perkhidmatan Haiwan 088-251233/251235.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">25. What are the benefits of neutering my pets?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">1. Pet Population Control
            <br/>
            Thousands of stray animals in our society is the result of the uncontrolled pet breeding and abandonment of unwanted pets. Thousands of these stray animals are suffering on the streets from diseases and human cruelty. Many of them will be euthanized, poisoned or killed by other means when the population becomes out of control and become a nuisance. By neutering your pets you can help effectively to reduce the population of stray animals and hence the unnecessarily suffering of stray animals.
            <br/><br/>
            2. Health Benefits
            <br/>
            For female cats and dogs
            <ul class="ulContent">
            <li>Reduces the risk of mammary tumour (Breast Cancer).</li>
            <li>Eliminated the risk of uterine infection (Pyomerta).</li>
            <li>Reduces the risk of TVT (Transmissible Venereal Tumour), a sexually transmitted cancer.</li>
            For male cats and dogs
            <ul class="ulContent">
            <li>Reduces the chances of TVT.</li>
            <li>Eliminates the risk of testicular cancer.</li>
            <li>Markedly reduces the risk of prostate and anal gland cancer.</li>
            <br/><br/>
            3. Behavioural Benefits
            <br/>
            <ul class="ulContent">
            <li>Reduces stress.</li>
            <li>Prevents male animals roaming and wandering in search of female, which can lead to road accidents, fighting leading to injuries and infections, spread of diseases such as TVT.</li>
            <li>Eliminates marking of territory by urine spraying.</li>
            <li>Reduces inter-dog aggression.</li>
            </ul>
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">26. When to neuter?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">1. a dog/cat – 4 to 6 months old
            <br/>
            2. Avoid the operation when the animal is on heat. Always seek veterinarian advice in advance.
            <br/>
            3. Avoid the operation immediately after delivery. Safer 2 months after delivery. Always seek veterinarian advice in advance.
            <br/><br/>
            <span style="font-weight: 600;">Note:</span> General preparation before operation - Fasting for minimum 8 hours (no food and water). Always seek veterinarian advice in advance.
            <br/><br/>
            For further information please consult a veterinary doctor.
            </div>
        </div>
        <div style="height: 40px;">
        </div>

        <div>
            <div class="lnkexpand" style="display:flex;justify-content: space-between; background: aliceblue; padding: 20px;">
                <div class="faqtext">27. When to vaccine / de-worm?
                </div>
                <div class="faqicon"><i class="material-icons">&nbsp;</i>
                </div>
            </div>
            <div class="hidden-content">Please consult a veterinary doctor for information.
            </div>
        </div>
        <div style="height: 40px;">
        </div>
    </div>
</body>
<?php include('include/footer.php'); ?>
</html>
												