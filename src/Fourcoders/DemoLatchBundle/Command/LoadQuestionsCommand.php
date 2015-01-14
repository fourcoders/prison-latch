<?php

namespace Fourcoders\DemoLatchBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Fourcoders\DemoLatchBundle\Entity\Question;

class LoadQuestionsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('latch:questions:load')
            ->setDescription('Load the default questions in the database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // SI => 1 NO => 0
        $questions = array(
            'Latch te ayuda a proteger tus servicios online' => 1,
            'Chema se dedica a la alfarería' => 0,
            'Latch NO está disponible para Firefox OS 1.1 y superior' => 0,
            'El blog de Chema se llama un informatico en el lado del mal' => 1,
            'Latch te permite reducir los riesgos de ataque dirigidos a tus servicios online' => 1,
            'Latch es igual de seguro que tener solamente usuario y contraseña' => 0,
            'Si ya tienes una cuenta de usuario de Latch, puedes activarla como cuenta de desarrollador' => 1,
            'Latch funciona como un sistema de alerta temprana independiente del sistema protegido' => 1,
            'El servicio Latch requiere información acerca de tus usuarios finales' => 0,
            'FOCA (Fingerprinting Organizations with Collected Archives) es una herramienta utilizada principalmente para encontrar metadatos e información oculta en los documentos que examina' => 1,
            'Para habilitar la comunicación entre tu servicio y la cuenta de Latch del usuario, se debe realizar un proceso de pareado entre la cuenta de Latch del usuario y tu servicio' => 1,
            'Para mantener la privacidad de ambas partes, Latch no intercambia ningún dato de los usuarios' => 1,
            'Una autenticación de doble factor hace referencia a cualquier mecanismo de autenticación que requiera dos componentes para identificar y autenticar a un usuario' => 1,
            'Chema nunca lleva gorro' => 0,
            'Latch está disponible para Windows Phone 8' => 1,
            'Latch tiene aplicación para iOS 6 e iOS 7' => 1,
            'Latch es un producto de Eleven Paths' => 1,
            'Chema nunca utilizó un ordenador hasta la fecha' => 0,
            'Puedes habilitar el bloqueo de la fase de autenticación del servicio, para que así el usuario pueda cerrar el acceso al servicio.' => 1,
            'Nunca podrás habilitar bloqueos en distintas operaciones de servicio.' => 0,
            'Chema Alonso es de Fuenlabrada' => 0,
            'Puedes habilitar un segundo factor de autenticación (contraseña de un solo uso) para acceder al servicio o a cualquiera de sus operaciones.' => 1,
            'Con todos los datos extraídos de todos los ficheros, FOCA va a unir la información y la va a mandar a cualquiera' => 0,
            'Latch tiene aplicación para Android 2.2 y superior' => 1,
            'Desde la app Latch pulsarán la opción Generar código de pareado para añadir un nuevo servicio' => 1,
            'Una vez que el proceso de pareado ha finalizado, recibirán una confirmación en la app Latch, y podrán acceder a la configuración para disfrutar de las funcionalidades que hayas definido para tu servicio' => 1,
            'Chema nunca será conocido como el Maligno' => 0,
            'Cada operación representa una funcionalidad de servicio que gestionarás' => 1,
            'ElevenPaths y Latch NUNCA te pedirán tu contraseña por correo electrónico' => 1,
            'Si tienes el Latch de ese servicio cerrado, recibirás una notificación por cada intento de acceso' => 1,
            'Si has perdido tu teléfono, no te recomendamos que cambies la contraseña de tu cuenta de Latch' => 0,
            'Latch no te permite configurar la app para que te solicite la contraseña cada vez que vayas a acceder a ella' => 0,
            'Cuando un proveedor crea un servicio que puede ser pareado en Latch, opcionalmente puede incluir su teléfono y su e-mail para que puedas contactar con él' => 1,
            'Los proveedores del servicio simplemente comprueban si has bloqueado el servicio' => 1,
            'Telefónica Digital Identity & Privacy es la denominación legal de ElevenPaths' => 1,
            'Latch te puede guardar el bolso y la bufanda' => 0,
            'Las empanadillas son el plato preferido de Chema' => 0,
            'Chema Alonso es actualmente CEO de Eleven Paths' => 1,
            'Puedes integrar Latch con Symfony2' => 1,
            '0xWord es una tienda de libros de seguridad informática' => 1,
            'Puedes contratar el plan Platinum en Latch' => 1,
            'En latch no hay plugins premium' => 0,
            'Para llegar a Mordor hay que pasar por Móstoles' => 0,
            'Puedes añadir un servicio en Latch mediante un Token Temporal de Pareado' => 1,
            'Latch está diponible para Symbian' => 0,
            'Angel y Yolanda son los protagonistas de "Hacker Épico' => 1,
            'Tu banco y cada día el de más gente, Nevele Bank' => 1,
            'Chema Alonso es de Móstoles'  => 1,
            'Puedes contratar el plan Bronze para Latch' => 0,
            'LatchBundle se instala mediante composer.json' => 1,
            'En el plan Community puedes crear 4 operaciones por aplicación' => 1,
            'En el plan Gold el numero maximo de cuentas pareadas son 50' => 0,
            '"Hacker Épico" es una novela de Tom Clancy' => 0,
            'El Mejor capitulo Calico electronico es "donramon y perchita"' => 1,
            'Metasploit es meta azul' => 0,
            'El numero de operaciones en el plan gold son 12' => 0,
            'En Latch Puedes parear hasta 50 cuentas con el plan Community' => 1,
            'LatchBundle funciona en Symfony 1.4' => 0,
            'Con una única cuenta de Latch puedes añadir protección a servicios de distintos proveedores' => 1,
            'Hay parear el servicio cada vez que desee bloquearlo/desbloquearlo' => 0,
            'El codigo de pareado se genera en tu app de Latch' => 1,
            'Latch Satellite es una opción que permite tener instalado en tu organización un servidor de Latch'=> 1,
            'Dolores Latcher es la madre de Latch' => 0,
            'Para usar latch en tu sitio web necesitas una cuenta de desarrollador' => 1,
            'SQL injection en php es imposible' => 0,
            '"or "1"="1"'=> 1,
            'El plan Community de Latch cuenta con dashboard' => 1,
            'Hay un plugin de latch en Pascal' => 0,
            'Tuenti está utilizando Latch' => 1,
            'Los usuarios están desprotegidos con Latch' => 0,
            'Patch y Latch son los mismo' => 0,
            'Latch es capaz de manejar enormes cantidades de peticiones' => 1,
            'Actualmente son más de 3.500 sitios los que han integrado Latch' => 1,
            'La universidad de Salamanca está integrada con Latch' => 1,
            'Con el plan Gold de Latch accede a funcionalidades avanzadas en ilimitadas cuentas, con soporte 24x7.' => 1,
            '0xWord es una tienda de flautas' => 0,
            'Nevele Bank es un banco Fake' => 1,
            'Un informático en el lado del mal es el blog de Chema Alonso' => 1,
            'Plan platinum en Latch es gratuito' => 0,
            'Latch no puede proteger Windows' => 0,
            'En Latch Plugins Contest puedes ganar hasta 10.000 dólares (en bitcoins)' => 1
        );
        $em = $this->getContainer()->get('doctrine')->getManager();
        foreach ($questions as $field => $result) {
            $newQuestion = new Question;
            $newQuestion->setField($field);
            $newQuestion->setResult($result);
            $em->persist($newQuestion);
        }
        $em->flush();

        $output->writeln(count($questions)." Questions load");
    }
}
