package tn.esprit.test.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import tn.esprit.test.entity.clinique;
import tn.esprit.test.entity.medecin;
import tn.esprit.test.repository.cliniquerepository;
import tn.esprit.test.repository.medecinrepository;

@Service
@AllArgsConstructor
public class medecinservice {
    medecinrepository medecinrepository;
    cliniquerepository cliniquerepository;
    public medecin addmedecin(medecin m){
        return medecinrepository.save(m);


    }

    public medecin addmedecintoclinique(medecin m,Long idclinique)
    {
        clinique clinique=cliniquerepository.findById(idclinique).orElse(null);
        medecinrepository.save(m);
        clinique.getMedecin().add(m);
        cliniquerepository.save(clinique);
        return m;


    }
}
