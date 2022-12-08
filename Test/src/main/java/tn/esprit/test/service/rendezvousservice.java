package tn.esprit.test.service;

import lombok.AllArgsConstructor;
import org.springframework.stereotype.Service;
import tn.esprit.test.entity.Specialite;
import tn.esprit.test.entity.medecin;
import tn.esprit.test.entity.patien;
import tn.esprit.test.entity.rendezvous;
import tn.esprit.test.repository.medecinrepository;
import tn.esprit.test.repository.patienrepository;
import tn.esprit.test.repository.rdvrepository;

import java.util.List;

@Service
@AllArgsConstructor
public class rendezvousservice {
    rdvrepository rdvrepository ;
    medecinrepository medecinrepository;
    patienrepository patienrepository;
    public void addRDVtomandpatien(rendezvous r,Long idm,Long idp)
    {

        medecin m=medecinrepository.findById(idm).orElse(null);
        patien p=patienrepository.findById(idp).orElse(null);
        rdvrepository.save(r);
        m.getRendezvous().add(r);
        p.getRendezvous().add(r);

    }
    public List<rendezvous> getrdvbycandspec(Long idc, Specialite s){
        return rdvrepository.findByMedecinCliniquesAndmAndMedecinSpecialite(idc, s);
    }
    public int getnbrm(Long idm){
        return rdvrepository.findByMedecin_Idmedecin(idm).size();
    }
}
