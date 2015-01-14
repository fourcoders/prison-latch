Feature: LATCH
     LATCH Test login 

    Background:
   	  Given I go to the "https://latch.elevenpaths.com/www/registerMobile"

    @javascript
    Scenario Outline: Test
        When I fill in "name" with "<name>"
        When I set place holder "{{token}}" with expression "$this->generateRandom()" 
        When I fill in "email" with "<email>"
        When I fill in "password" with "<password>"
        When I fill in "passwordCheck" with "<passwordCheck>"
        When I check "terms"
        When I press "<button>"
        Then I should see "<message>"
        Then I go to the "https://harakirimail.com/inbox/aaaaa"
        Then I follow "Confirma tu cuenta de Latch"
        Then wait
        Then I follow "Clic aquí para activar la cuenta"
        Then wait
        Then wait
        Then wait

    Examples:
        | name  | email                    | password | passwordCheck | button   | message                                             |
#        | a     | {{token}}@maildrop.cc | aaaaaa   | aaaaav        | register | Crear una nueva cuenta                              |
        | aaaaa   | aaaaa@harakirimail.com| aaaaaa   | aaaaaa        | register | Se han enviado instrucciones para activar tu cuenta |
