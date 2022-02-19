@extends('layouts.app')

@section('title', __('message.Instructors'))

@section('content')
    <section class="l-content-block p-team">
        <div class="container pb-100px">
            <p>
                「Init」（https://init-online.com   {{ __('message.Hereinafter referred to as this service. ) Will be provided only to instructors who have accepted the following Instructor Terms (hereinafter referred to as Terms) (defined in Article 1, Paragraph 1, Item 3 below). It is a service. The instructor shall use this service after agreeing to the contents of this agreement in advance.') }}
            </p>
            <br>
            <b>{{ __('message.1. Definition / Content of this service') }}</b>
            <p>
                1-1. {{ __('message.In this agreement, the terms of each of the following items shall have the prescribed meaning of each item.') }}<br>
                &nbsp; ①「{{ __('message.lesson') }}」：{{ __('message.Attendance application') }}<br>
                &nbsp; ②{{ __('message.Students: Those who wish to take lessons or actually take them') }}<br>
                &nbsp; ③{{ __('message.3 Adviser: Person who wants to provide lessons or actually offers') }}<br>
                &nbsp; ④{{ __('message.Lesson contract: A contract regarding the provision and attendance of lessons concluded between the instructor and the student.') }}<br>
                &nbsp; ⑤{{ __('message.Lesson fee: Fee paid by the student to the instructor through our company in consideration of the lesson contract') }}<br>
                &nbsp; ⑥{{ __('message.6 Matching Service: Service that mediates the sign of lesson contract and payment of lesson fee') }}<br>
                &nbsp; ⑦{{ __('message.Matching fee: Fee paid by the student to the Company as a consideration for using the matching service') }}<br>
                &nbsp; ⑧{{ __('message.8 Service Fee: Total amount of lesson fee and matching fee') }}<br>
                &nbsp; ⑨{{ __('message.Coin: An electromagnetic record given to students by the Company in exchange for a certain amount of money, which is a means of paying service fees.') }}<br>
                &nbsp; ⑩{{ __('message.Our site: The latest website operated by our company') }}<br>
                {{ __('message.1-2. This service uses the following items of the following items.') }}<br>
                &nbsp; {{ __('message.1 Service that searches for lessons by students, application for lesson contracts, application for application lesson contracts, etc.') }}<br>
                &nbsp; ② {{ __('message.Matching service') }}<br>
                &nbsp; ③ {{ __('message.A service that provides counseling to students regarding the services of the previous items') }}<br>
                &nbsp; ④ {{ __('message.Service to give lessons to students') }}<br>
                &nbsp; ⑤ {{ __('message.A service that regularly or irregularly distributes updated information on our site, campaign information, and other information separately determined by our company to students by e-mail (hereinafter referred to as email magazine service).') }}<br>
                &nbsp; ⑥ {{ __('message.A service that facilitates the instructors acceptance of lesson contract applications from students') }}<br>
                &nbsp; ⑦ {{ __('message.Other services separately determined by the Company') }}<br>
            </p>
            <br>
            <b>2. {{ __('message.Application of terms') }}</b>
            <p>
                2-1. {{ __('message.This agreement shall apply to the use of this service by the instructor.') }}<br>
                2-2. {{ __('message.In addition to these Terms, all notices issued by the Company to the instructor based on Article 3, including the Terms of Use and the provisions established by the Company and postings on the Companys website (hereinafter collectively referred to as Terms of Use, etc. Established by the Company, etc. ) Each constitutes a part of this agreement.') }}<br>
                2-3. {{ __('message.If the provisions of this agreement differ from the terms of use, provisions, and notifications set forth in the preceding paragraph, the notice, provisions, terms of use, and agreement shall be applied in that order. If the content of the notification posted on our site is different from the content of the notification by other methods, the one notified later shall be applied with priority.') }}<br>
                2-4. {{ __('message.Regarding the use of this service by students, the student agreement (hereinafter referred to as student agreement) separately established by the Company shall apply.') }}<br>
                2-5. {{ __('message.The date and time in this agreement shall be in accordance with the standard time in Japan.') }}<br>
            </p>
            <br>
            <b>3. {{ __('message.Notice from us') }}</b>
            <p>
                3-1. {{ __('message.The Company shall notify the instructor of matters that the Company deems necessary at any time by posting on the Companys site, sending e-mails, sending documents, or any other method that the Company deems appropriate.') }}<br>
                3-2. {{ __('message.For the notice set forth in the preceding paragraph, if the Company has posted the notice set forth in the preceding paragraph on the Companys site, sent an e-mail, or sent a document, the Company will post it on the Companys site, send an e-mail, or send a document. It shall take effect from the time of shipment.') }}
            </p>
            <br>
            <b>4. {{ __('message.Eligibility to use this service') }}</b>
            <p>
                {{ __('message.In order for the instructor to use this service, it is necessary to meet all of the following conditions.') }}<br>
                &nbsp; 4-1. {{ __('message.Being at least 20 years old and legally responsible') }}<br>
                &nbsp; 4-2. {{ __('message.Work is permitted in the country of residence and the country of residence') }}<br>
            </p>
            <br>
            <b>5. {{ __('message.Regarding the use of this service') }}</b>
            <p>
                5-1. {{ __('message.The instructor shall judge the truth, accuracy, certainty, reliability, usefulness, etc. of the information provided by the Company and other quality, accuracy, certainty, reliability, usefulness, etc. of this service by himself / herself. , You agree in advance to use these at your own risk.') }}<br>
                5-2. {{ __('message.We do not hire instructors, and instructors agree in advance that no employment contract will be established between us and the instructor.') }}<br>
                5-3. {{ __('message.We will do our utmost to ensure the safety of this site so that our instructors can provide lessons with peace of mind, but we do not guarantee it.') }}<br>
                5-4. {{ __('message.When using this service, the instructor will always give top priority to the students and will try to do their best to the extent that they can think with good sense.') }}<br>
                5-5. {{ __('message.We will do our utmost to ensure that our students are given lessons smoothly and satisfactorily. Therefore, if we determine that the quality of the lessons provided by the instructor, the prior communication accompanying the implementation, and the quality of customer service do not reach the level required by item 4 of this article, we will contact the instructor at our discretion. The service fee can be returned with the cancellation of the lesson fee without prior notice. In addition, if the instructors attitude toward customer service / response and customer service are significantly different from the standards required by the Company, the registration of the instructor may be canceled at the discretion of the Company.') }}<br>
                5-6 {{ __('message.In principle, lessons will be provided by the instructor, and we will not provide lessons unless we deem it necessary.') }}<br>
                5-7. {{ __('message.We undertake no obligation to assess or manage the lessons provided by the instructor and the information provided to each other between the instructor and the student.') }}<br>
                5-8. {{ __('message.The Company does not guarantee the truthfulness, certainty, reliability, usefulness, etc. of the identity information of the instructor and students and other information posted by the instructor and students.') }}<br>
                5-9. {{ __('message.The Company shall not be liable for any act that the instructor violates the law in connection with this service.') }}<br>
                5-10. {{ __('message.The Company shall not be liable for any information, files, articles, etc. provided to each other between the student and the instructor, and the student shall provide the student with such information, files, articles, etc. You agree in advance that we will not be liable for any kind of damage or loss that occurs.') }}<br>
                5-11. {{ __('message.The instructor shall not provide information, files, goods, etc. to the students for any purpose other than fulfilling the lesson contract concluded by the matching service, unless otherwise approved by the Company.') }}
            </p>
            <br>
            <b>6. {{ __('message.Trouble with other teachers') }}</b>
            <p>
                {{ __('message.In the unlikely event that the instructor suffers some damage or inconvenience from other students, instructors or other third parties, and if a problem occurs between the instructor and other instructors, students or other third parties, We will try to resolve the problem at our own risk and expense, and if we suffer any damage in connection with the trouble, all the damage (including but not limited to reasonable attorneys fees). ) Shall be liable for immediate compensation. If the Company resolves the problem, the instructor will be responsible for all costs (including but not limited to reasonable attorneys fees) required to resolve the problem.') }}
            </p>
            <br>
            <b>7. {{ __('message.Adviser registration') }}</b>
            <p>
                7-1. {{ __('message.The instructor himself enters his name, gender, e-mail address, desired password, country of residence and other information specified separately by us in the input form on the instructor registration page on our site, and sends it to us. Instructor registration application (hereinafter referred to as instructor registration application) shall be made by a method specified separately by. The instructor shall not allow a third party to apply for instructor registration, and shall not enter false information when applying for instructor registration.') }}<br>
                7-2. {{ __('message.The Company shall approve the instructor registration application by sending an e-mail to the instructor to the effect that the instructor registration application is accepted or by any other method separately determined by the Company.') }}<br>
                7-3. {{ __('message.If any of the following items apply, we may not accept the instructor registration application without disclosing the reason.') }}<br>
                &nbsp; ① {{ __('message.When it is found that the instructor registration application was made by a third party other than the instructor (except when the Company approves separately)') }}<br>
                &nbsp; ② {{ __('message.When it is found that the contents entered at the time of application for instructor registration are false, incorrect, or omitted.') }}<br>
                &nbsp; ③ {{ __('message.When it is found that the instructor has been deleted from the instructor registration due to a violation of this agreement in the past') }}<br>
                &nbsp; ④ {{ __('message.In addition, if we accept the instructor registration application, or if we determine that it is inappropriate to accept the instructor registration application, if we determine that it is inappropriate to accept it.') }}<br>
                7-4. {{ __('message.If there is a change in the name, e-mail address, country of residence or other information specified by us when applying for instructor registration, the instructor shall immediately notify us by the method separately determined by us.') }}<br>
                7-5. {{ __('message.The instructor may cancel the instructor registration by himself / herself according to the procedure separately determined by the Company. However, this does not apply if you already have a confirmed lesson schedule.') }}
            </p>
            <br>
            <b>8. {{ __('message.Suspension of provision of this service ・ Cancellation of instructor registration by our company') }}</b>
            <p>
                {{ __('message.If the instructor falls under any of the following items, the Company may suspend the provision of this service to the instructor or cancel the instructor registration without prior notice.') }}<br>
                &nbsp; ① {{ __('message.If it is found that the instructor registration has been deleted due to a violation of this agreement in the past') }}<br>
                &nbsp; ② {{ __('message.When the act specified in each item of Article 13 is performed') }}<br>
                &nbsp; ③ {{ __('message.In addition to the provisions of the preceding two items, if you violate this agreement') }}<br>
                &nbsp; ④ {{ __('message.When it is judged that the attitude of customer service to the students and the way of thinking in providing lessons do not meet the standards required by Article 5.4.') }}<br>
                &nbsp; ⑤ {{ __('message.If it is determined that the reliability of this site will be impaired if the lessons are continuously provided.') }}<br>
                &nbsp; ⑥ {{ __('message.In addition, if we determine that it is inappropriate to provide this service or maintain instructor registration.') }}<br>
            </p>
            <br>
            <b>9. {{ __('message.Password management and use, etc.') }}</b>
            <p>
                9-1. {{ __('message.The instructor shall be responsible for the management and use of the password issued by the Company to the instructor (hereinafter referred to as password), and the Company shall not be responsible for the management of the password.') }}<br>
                9-2. {{ __('message.The instructor shall not assign, lend, disclose, or use the password to a third party unless otherwise approved by the Company.') }}<br>
                9-3. {{ __('message.The instructor who holds the password shall bear all responsibility for any disadvantage, damage, falsification, etc. due to mistakes in the use of the password or unauthorized use by a third party, and the Company shall not be liable at all. increase.') }}<br>
                9-4. {{ __('message.If the instructor discovers that the password has been used illegally by a third party without permission, the instructor shall immediately contact the Company and shall comply with the instructions from the Company.') }}<br>
            </p>
            <br>
            <b>10. {{ __('message.Cost burden') }}</b>
            <p>
                10-1. {{ __('message.The instructor will use the hardware (including but not limited to PCs, headsets, microphones, earphones, etc.) and software (Article 18, Paragraph 1 below) necessary to use this service or provide lessons. Including, but not limited to, the calling software specified in Section), communication lines and everything else shall be prepared at your own risk and expense.') }}<br>
                10-2. {{ __('message.The instructor acknowledges that the use of this service or the provision of lessons will incur communication costs such as telephone charges, internet connection costs, electricity costs and other costs in addition to those specified in the preceding paragraph, and shall bear these costs. increase.') }}
            </p>
            <br>
            <b>11. {{ __('message.Lesson Fee') }}</b>
            <p>
                11-1. {{ __('message.The instructor shall grant us all the authority necessary for us to collect lesson fees from the students on behalf of the instructors or to return the lesson fees collected from the students.') }}<br>
                11-2. {{ __('message.For lesson fees billed by the prescribed method with the end of each month as the closing date, we will transfer the lesson fee for the month to the bank account approved in advance by the instructor by the end of the designated month. Remittance shall be made. In addition, the instructor shall bear the fee required for the transfer as a transfer fee.') }}<br>
                11-3. {{ __('message.The deadline for billing is 6 months from the date the lesson is offered, after which the instructor shall lose all rights to claim the lesson fee.') }}<br>
                11-4. {{ __('message.Notwithstanding the provisions of the preceding paragraph, the Company may withhold the remittance of the lesson fee if any of the following items apply.') }}<br>
                &nbsp;① {{ __('message.When the student requests us to return the points used') }}<br>
                &nbsp;② {{ __('message.If the lesson time stipulated in the lesson contract is prevented from being completed for a total of 20% of the lesson time, or if the Company determines that there is a possibility of it.') }}<br>
                &nbsp;③ {{ __('message.If we determine that the instructor has violated or may have violated this agreement') }}<br>
                &nbsp;④ {{ __('message.When the Company cannot pay the lesson fee due to an error or lack of information such as the bank account specified in Paragraph 4 of this Article or other information reported to the Company by the instructor.') }}<br>
                &nbsp;⑤ {{ __('message.In addition, if we determine that we need to withhold payment of the lesson fee') }}<br>
                11-5. {{ __('message.If the lesson fee cannot be remitted due to the reason in (4) above, or if the lesson fee is returned to us due to an error or shortage of account information despite payment, the remittance will be made within one month from the date of remittance. Only in that case, the remittance procedure shall be performed again.') }}<br>
                11-6. {{ __('message.If we respond to a request from a student to return the points used based on the student agreement and the Cancellation Policy (for students) separately set by us, we will be obliged to pay the lesson fee to the instructor of the student and our company. The obligation to remit the lesson fee corresponding to the points used to the instructor shall be extinguished, and if the lesson fee has been remitted, the instructor shall immediately return the amount equivalent to the remitted lesson fee to the Company. ..') }}<br>
                11-7. {{ __('message.The lesson fee will be calculated in Japanese Yen and the payment will be converted into the payment currency selected by the instructor.') }}<br>
                11-8. {{ __('message.For control of payment method to foreigners, bank transfer is available only in Japan.') }}<br>
            </p>
            <br>
            <b>12. {{ __('message.Lesson contract') }}</b>
            <p>
                12-1. {{ __('message.The lesson contract shall be established when the instructor sends an e-mail to the effect that the instructor accepts the application using the system on this service in response to the lesson contract application by the student.') }}<br>
                12-2. {{ __('message.The instructor agrees in advance that the student can apply for the lesson contract or cancel the lesson contract after it is established based on the Cancellation Policy (for students) separately set by the Company.') }}<br>
                12-3. {{ __('message.Regarding whether or not the instructor can refuse the lesson contract application received from the student, whether or not the lesson contract can be canceled or the time can be changed after the establishment, and the handling when the lesson contract after the establishment is canceled, etc. Policy (for instructors) ”.') }}<br>
                12-4. {{ __('message.The Company shall be able to request the instructor to provide information that the Company deems necessary in the event of a situation that falls under or is expected to fall under any of the following items, and the instructor shall be concerned. You must respond to your request immediately.') }}<br>
                &nbsp; ① {{ __('message.When the instructor or student cancels the lesson contract after it is established') }}<br>
                &nbsp; ② {{ __('message.When any of the items of Article 11 Paragraph 5 is applicable') }}<br>
                &nbsp; ③ {{ __('message.In addition, when we deem it necessary') }}<br>
            </p>
            <br>
            <b>13. {{ __('message.Prohibited matter') }}</b>
            <p>
                13-1. {{ __('message.The instructor shall not perform the following acts in connection with the use of this service or the provision of lessons.') }}<br>
                &nbsp; ① {{ __('message.Acts of providing lessons and other services that require qualifications, permits, authorizations, registrations, licenses, etc., such as legal or medical advice, even though they do not have qualifications, permits, authorizations, registrations, licenses, etc.') }}<br>
                &nbsp; ② {{ __('message.Providing lessons and other services that include content related to crime and discrimination and other acts that lead to crime') }}<br>
                &nbsp; ③ {{ __('message.Providing lessons and other services that are offensive to public order and morals') }}<br>
                &nbsp; ④ {{ __('message.Acts of sending or posting obscene or child abuse behaviors, acts, images, documents, etc.') }}<br>
                &nbsp; ⑤ {{ __('message.Acts of using this service for purposes other than providing lessons such as buying and selling goods') }}<br>
                &nbsp; ⑥ {{ __('message.Acts that infringe or may infringe other instructors, students or other third parties or our property, privacy, portrait rights or publicity rights') }}<br>
                &nbsp; ⑦ {{ __('message.Acts of sending or posting information that is contrary to the facts') }}<br>
                &nbsp; ⑧ {{ __('message.Acts of falsifying or erasing information that can be used by this service, or acts of attempting it') }}<br>
                &nbsp; ⑨ {{ __('message.Acts that infringe or may infringe intellectual property rights such as copyrights and trademark rights of other instructors, students and other third parties or our company') }}<br>
                &nbsp; ⑩ {{ __('message.Acts that discriminate against or slander other instructors, students or other third parties or the Company, or damage the honor or credibility of other instructors, students or other third parties or the Company') }}<br>
                &nbsp; ⑪ {{ __('message.Sending e-mails such as advertisements, advertisements, solicitations, etc. to other instructors, students or other third parties or our company without permission, sending e-mails that the recipient dislikes, e-mails of others Acts that interfere with the reception of emails, acts that request a third party to forward a chain of emails, or acts that forward emails in response to the request.') }}<br>
                &nbsp; ⑫ {{ __('message.Acts aimed at soliciting religions, political associations, MLM, etc.') }}<br>
                &nbsp; ⑬ {{ __('message.Election campaigns or similar acts or acts that violate the Public Offices Election Act') }}<br>
                &nbsp; ⑭ {{ __('message.Acts of using or providing harmful programs such as computer viruses or acts of recommending') }}<br>
                &nbsp; ⑮ {{ __('message.Acts of using this service by pretending to be another instructor, student, or other third party') }}<br>
                &nbsp; ⑯ {{ __('message.Attempting unauthorized access to other computer systems or networks connected to this service') }}<br>
                &nbsp; ⑰ {{ __('message.Violent demands or unreasonable demands beyond legal responsibility') }}<br>
                &nbsp; ⑱ {{ __('message.Acts of threatening behavior or using violence in relation to transactions') }}<br>
                &nbsp; ⑲ {{ __('message.Acts of disseminating rumors, damaging the credibility of the other party or interfering with the other partys business by using counterfeiting or power') }}<br>
                &nbsp; ⑳ {{ __('message.In addition to the provisions of the preceding items, acts that violate laws and regulations or public order and morals (including but not limited to prostitution, violence, atrocities, etc.) or disadvantages to other instructors, students, other third parties, or the Company. Act of giving') }}<br>
                &nbsp; ㉑ {{ __('message.Acts of introducing or arranging services that conflict with or may conflict with this service to other instructors, students, and other third parties.') }}<br>
                &nbsp; ㉒ {{ __('message.The act of providing information about this service that you have learned as an instructor to a third party who competes with or may conflict with this service.') }}<br>
                &nbsp; ㉓ {{ __('message.Acts that promote or promote the acts specified in the preceding items') }}<br>
                &nbsp; ㉔ {{ __('message.Other acts that the Company deems inappropriate') }}<br>
                13-2. {{ __('message.The instructor may use the information about the students that he / she has learned in connection with this service for purposes other than the use of this service and the fulfillment of the lesson contract concluded by the matching service, not only during the instructor registration but also after the instructor registration is deleted. It shall not be used, and no direct lesson application, etc. shall be made to the students included in the information without using the matching service.') }}
            </p>
            <p id="terms14" style="position: relative;top: -150px;"></p>
            <br>
            <b>14. {{ __('message.Instructor responsibility') }}</b>
            <p>
                {{ __('message.The instructor expresses and warrants to the Company the matters specified in the following items, and agrees in advance that the Company will not be liable for any violation of the items specified in the following items. will do.') }}<br>
                &nbsp; ① {{ __('message.The information uploaded by the instructor on this site and other information reported to us by the instructor must be accurate and up-to-date.') }}<br>
                &nbsp; ② {{ __('message.Information provided by the instructor to the students and the truth, accuracy, reliability, usefulness, etc. of the lesson') }}<br>
                &nbsp; ③ {{ __('message.Fulfilling the content agreed with the student in the lesson contract (including but not limited to lesson content and lesson time)') }}<br>
                &nbsp; ④ {{ __('message.Regarding the lesson fee received from our company, we will take full responsibility for the tax and tax payment procedures, etc. in accordance with the laws and regulations of the instructors country of origin and country of residence.') }}<br>
            </p>
            <br>
            <b>15. {{ __('message.E-mail, uploaded information, etc.') }}</b>
            <p>
                15-1. {{ __('message.The Company shall not be liable for the contents of e-mails or uploaded information created by instructors, students and other third parties.') }}<br>
                15-2. {{ __('message.The instructor shall be solely responsible for the instructors e-mail transmission, uploading of information, correspondence with the e-mail service provider, and other conditions, guarantees or representations related to the correspondence, and the instructor shall take such correspondence. You agree to indemnify us from any kind of damage or loss as a result of.') }}
            </p>
            <br>
            <b>16. {{ __('message.Handling of confidential information, etc.') }}</b>
            <p>
                16-1. {{ __('message.The instructor will use the personal information of the instructor and other information about the instructor (hereinafter referred to as personal information, etc. .) Will be provided to us. Of the personal information, etc., the information that we have obtained prior consent from the instructor to post on this site after clearly stating that we will post it on this site for the purpose of notifying the students separately in the input form etc. It shall be posted on the site.') }}<br>
                16-2. {{ __('message.In addition to what is specifically stipulated in this agreement, the instructor may be another instructor, student or other third party obtained in connection with the use of this service or the provision of lessons, not only during the instructor registration but also after the instructor registration has been deleted. And all information about our company (hereinafter referred to as confidential information) shall be kept strictly confidential, and may be disclosed or leaked to a third party regardless of the method. It shall not be used for any purpose other than the use of this service and the fulfillment of the lesson contract concluded by the matching service.') }}<br>
                16-3. {{ __('message.The instructor shall immediately return or dispose of any information, files, goods, etc. received from the Company in accordance with the instructions of the Company if requested by the Company or if the instructor registration is deleted.') }}<br>
                16-4. {{ __('message.The instructor shall not use this service to provide information about the content of the lesson to other instructors. However, this does not apply to the information posted on this site based on Paragraph 1 of this Article.') }}<br>
                16-5. {{ __('message.In addition to what is specifically provided for in these Terms, the instructor must not provide information about lesson fees and services that conflict with or may conflict with this service to other instructors, students or other third parties. will do.') }}<br>
            </p>
            <br>
            <b>17. {{ __('message.Grant of license right') }}</b>
            <p>
                {{ __('message.The instructor will use and disclose to the Company the information that the instructor has uploaded to the profile page and other web pages of our site (including but not limited to information generated or derived from this information) worldwide. , Display, reproduction, modification, translation, distribution, deletion, etc. Non-exclusive license rights with sublicense rights shall be granted free of charge and permanently. In addition, all information other than personal information uploaded by the instructor to the profile page and other web pages of our site, including texts, photos, paintings, music, and evaluations, includes information for which we receive license rights from the instructor based on the main text of this article. Information is assumed to be included.') }}
            </p>
            <br>
            <b>18. {{ __('message.Use of calling software') }}</b>
            <p>
                18-1. {{ __('message.When providing lessons, the instructor shall use the online calling software designated by us (hereinafter referred to as calling software) provided by a third party.') }}<br>
                18-2. {{ __('message.When using the calling software, the instructor shall comply with the terms of use, terms of use and other provisions set by the third party who provides the calling software.') }}<br>
                18-3. {{ __('message.Before registering as an instructor, the instructor must download the calling software and check whether the calling software can be used in the instructors environment.') }}<br>
                18-4. {{ __('message.Our company could not use call software under the instructors environment, even if the adviser could not provide lessons due to the hardware failure and setup required for the use of the call software. It shall be responsible.') }}
            </p>
            <br>
            <b>19. {{ __('message.Non-warranty / disclaimer') }}</b>
            <p>
                19-1. {{ __('message.The Company shall not provide any warranty for the authenticity, accuracy, certainty, reliability, usefulness, and lesson quality, reliability, usefulness, etc. of the information provided in this service. The person is not responsible for any damages or losses that are covered in connection with these.') }}<br>
                19-2. {{ __('message.The Company shall not be liable for any damage or loss incurred by the student due to suspension of the provision of this service, cancellation of student registration, interruption, change, addition, abolition, etc. of this service.') }}<br>
                19-3. {{ __('message.The Company shall not be liable for any damage or loss incurred by the instructor due to the act or omission of a third party including other instructors.') }}<br>
                19-4. {{ __('message.In addition to the provisions of this agreement, the Company shall not be liable for any damage or loss incurred by the instructor in connection with the use of this service.') }}<br>
                19-5. {{ __('message.The Company shall not be liable for any damage or loss caused by the instructor to other instructors, students or other third parties in connection with the use of this service.') }}
            </p>
            <br>
            <b>20. {{ __('message.Relationship with advertisers, etc.') }}</b>
            <p>
                20-1. {{ __('message.When the instructor participates in the sales promotion activities of the advertisers and other businesses (hereinafter referred to as advertisers, etc.) of the advertisements posted on this site, troubles that occur between the instructor and the advertisers, etc. It is agreed that all such matters should be processed and resolved between the instructor and the advertiser.') }}<br>
                20-2. {{ __('message.The Company shall not be liable for any actions by third parties including those who are contacted and contacted by the instructor by using the links set up by the advertisers, the website operated by the advertisers, or the service or software. will do.') }}<br>
                20-3. {{ __('message.The instructor agrees in advance to indemnify the Company for any damage or loss caused to the instructor by the advertiser or other third party.') }}<br>
            </p>
            <br>
            <b>21. {{ __('message.Suspension of provision of this service') }}</b>
            <p>
                {{ __('message.The Company shall be able to temporarily suspend the provision of this service without notifying the instructor in advance in any of the following cases.') }}<br>
                &nbsp; ① {{ __('message.When it is unavoidable due to maintenance or construction of the equipment for this service') }}<br>
                &nbsp; ② {{ __('message.When a failure occurs in the equipment for this service and it is unavoidable') }}<br>
                &nbsp; ③ {{ __('message.When the telecommunications service becomes unavailable due to the telecommunications service provided by the telecommunications carrier') }}<br>
                &nbsp; ④ {{ __('message.In addition, if we determine that this service needs to be temporarily suspended due to operational or technical reasons.') }}<br>
            </p>
            <br>
            <b>22. {{ __('message.Changes / additions to the contents of this service') }}</b>
            <p>
                {{ __('message.The Company shall be able to change or add the contents of this service without notifying the instructor in advance.') }}
            </p>
            <br>
            <b>23. {{ __('message.Abolition of this service') }}</b>
            <p>
                {{ __('message.The Company shall be able to abolish this service by notifying the instructor.') }}
            </p>
            <br>
            <b>24. {{ __('message.Attribution of rights') }}</b>
            <p>
                {{ __('message.Intellectual property rights such as copyrights, trademark rights, portrait rights, publicity rights, etc. regarding information, etc. (including but not limited to video, audio, text, photographs, images, etc.) provided by the Company in this service. Unless otherwise specified, all rights belong to the Company.') }}
            </p>
            <br>
            <b>25. {{ __('message.Revision of these Terms, etc.') }}</b>
            <p>
                25-1. {{ __('message.The Company shall be able to revise this agreement, the terms of use, etc. established by the Company without obtaining the consent of the instructor.') }}<br>
                25-2. {{ __('message.The revised Terms and Conditions, Terms of Use, etc. established by the Company shall become effective in accordance with Article 3, Paragraph 2 from the time the Company notifies the instructor of the revised content.') }}
            </p>
            <br>
            <b>26. {{ __('message.Compensation for damages') }}</b>
            <p>
                {{ __('message.In addition to what is specifically stipulated in this agreement, if the instructor causes damage to the Company by violating this agreement, or intentionally or negligently, all damages (including reasonable attorneys fees) to the Company. (Not limited to this)) shall be liable for immediate compensation.') }}
            </p>
            <br>
            <b>27. {{ __('message.Prohibition of transfer of rights and obligations and provision of collateral') }}</b>
            <p>
                {{ __('message.The instructor shall not assign or inherit all or part of the rights and obligations based on this agreement to a third party, or provide it as collateral.') }}
            </p>
            <br>
            <b>28. {{ __('message.Elimination of antisocial forces') }}</b>
            <p>
                {{ __('message.The instructor expresses that it does not fall under any one of the following items, and expresses that it does not fall under any of the following items, and warrants it.') }}<br>
                ① {{ __('message.Those who have not passed 5 years since they became gangsters, gangsters, gangsters, associate members of gangsters, companies related to gangsters, general assembly shops, social movements, etc. (Hereinafter, collectively referred to as gang members, etc.)') }}<br>
                ② {{ __('message.Having a relationship in which gangsters, etc. are recognized as controlling management') }}<br>
                ③ {{ __('message.Having a relationship in which gangsters, etc. are deemed to be substantially involved in management') }}<br>
                ④ {{ __('message.Having a relationship that is recognized as using gangsters, etc., for the purpose of gaining the wrongful profits of oneself or a third party, or for the purpose of damaging a third party.') }}<br>
                ⑤ {{ __('message.Having a relationship that is recognized as being involved in providing funds, etc., or providing facilities to gangsters, etc.') }}<br>
                ⑥ {{ __('message.A person who is substantially involved in his / her own management or his / her own management has a relationship that should be socially criticized with a member of a gangster, etc.') }} <br>
            </p>
            <br>
            <b>29. {{ __('message.Governing law') }}</b>
            <p>
                {{ __('message.The governing law for this agreement shall be Japanese law.') }}
            </p>
            <br>
            <b>30. {{ __('message.Court of competent jurisdiction') }}</b>
            <p>
                {{ __('message.If there is a need for a proceeding between the instructor and the Company or between the student and the instructor in connection with this service, the instructor in the court of jurisdiction and the Company shall file a proceeding with the Tokyo District Court or the Tokyo Summary Court according to the amount of the proceeding. You agree to be the exclusive agreement jurisdictional court of the first instance.') }}
            </p>
            <br>
            <b>31. {{ __('message.language') }}</b>
            <p>
                {{ __('message.This agreement shall be written in Japanese and languages other than Japanese, and if the contents of this agreement created in Japanese and this agreement created in a language other than Japanese are different, it shall be written in Japanese. The contents of this agreement created shall be followed.') }}
            </p>
            <br>
            <b>32. {{ __('message.Survival clause') }}</b>
            <p>
                {{ __('message.Even after the instructor registration is deleted, Article 2, Article 3, Article 5, Paragraphs 1 to 3, Article 5, Paragraphs 5 to 8, Article 6, Article 9, Article 10, Article 10 Article 11 Paragraph 2, Article 11 Paragraphs 5 to 7, Article 12, Article 14 to Article 17, Article 18 Paragraph 4, Article 19, Article 20, Article 24, Article 26 Or each provision of this article shall still be valid.') }}
            </p>
            <br>
            <b>33. {{ __('message.Talk resolution') }}</b>
            <p>
                {{ __('message.Matters not stipulated in this agreement or matters that raise doubts about the interpretation of this agreement shall be resolved after discussions in good faith between the instructor and the Company.') }}
            </p>
            <br>
            <b>34. {{ __('message.Supplementary provisions') }}</b>
            <p>
                {{ __('message.Enacted and enforced on September 17, 2021 (Reiwa 3)') }}
            </p>
        </div>
    </section>
@endsection
