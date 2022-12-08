package tn.esprit.test.entity;

import jakarta.persistence.*;
import lombok.Getter;
import lombok.Setter;

import java.io.Serializable;
import java.util.Set;

@Entity
@Table(name ="clinique")
@Getter
@Setter
public class clinique implements Serializable {
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    @Column(name = "idclinique")
    private Long idclinique;
    private String nomC;
    private String adresse;
    private Long telephone;
    @ManyToMany(cascade = CascadeType.ALL)
    private Set<medecin> medecin;


}
