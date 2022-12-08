package tn.esprit.test.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import tn.esprit.test.entity.Specialite;
import tn.esprit.test.entity.rendezvous;

import java.util.List;

public interface rdvrepository extends JpaRepository<rendezvous,Long> {
    List<rendezvous> findByMedecinCliniquesAndmAndMedecinSpecialite(Long idclinique, Specialite s);
    List<rendezvous> findByMedecin_Idmedecin(Long idm);
}
