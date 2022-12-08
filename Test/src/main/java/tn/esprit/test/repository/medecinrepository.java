package tn.esprit.test.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import tn.esprit.test.entity.Specialite;
import tn.esprit.test.entity.medecin;

public interface medecinrepository extends JpaRepository<medecin,Long> {
    medecin findBySpecialite(Specialite s);
}
