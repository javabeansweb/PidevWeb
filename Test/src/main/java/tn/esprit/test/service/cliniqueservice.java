package tn.esprit.test.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import tn.esprit.test.entity.clinique;
import tn.esprit.test.repository.cliniquerepository;
@Service
@AllArgsConstructor
public class cliniqueservice {
    cliniquerepository cliniquerepository;
    public clinique addclinique(clinique c){
        return cliniquerepository.save(c);
    }
}
