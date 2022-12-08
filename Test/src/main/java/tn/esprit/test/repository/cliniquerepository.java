package tn.esprit.test.repository;

import org.springframework.data.jpa.repository.JpaRepository;
import tn.esprit.test.entity.clinique;

public interface cliniquerepository extends JpaRepository<clinique,Long> {
}
