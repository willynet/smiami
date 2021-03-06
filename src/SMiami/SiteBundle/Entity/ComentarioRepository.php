<?php

namespace SMiami\SiteBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ComentarioRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComentarioRepository extends EntityRepository
{
    public function getComentariosByUser($id)
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT c.id, c.comentario, c.fecha, a.nombre AS anuncio FROM SiteBundle:Comentario c JOIN c.anuncio a WHERE c.autor = $id";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getComentariosPublicos()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT c.id, c.comentario, c.fecha, u.username AS autor, a.nombre AS anuncio FROM SiteBundle:Comentario c JOIN c.anuncio a JOIN c.autor u WHERE c.privado = false";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
    
    public function getComentariosPrivados()
    {
        $em = $this->getEntityManager();
        
        $strSQL = "SELECT c.id, c.comentario, c.fecha, u.username AS autor, a.nombre AS anuncio FROM SiteBundle:Comentario c JOIN c.anuncio a JOIN c.autor u WHERE c.privado = true";
        $consulta = $em->createQuery($strSQL);
        
        return $consulta->getResult();
    }
}
